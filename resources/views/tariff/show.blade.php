<x-layout>
    <div class="container" style="margin: 100px auto;">
        <div class="row justify-content-between">
            <img class="col-lg-4" src="{{ asset('storage/' . $tariff['image']) }}" alt="alt">
            <div class="col-lg-6">
                <h2 class="text-right"><b>{{ $tariff['name'] . ', ' . $tariff->location[0]->country_translation }}</b>
                </h2>
                <div class="text-justify my-5">{!! $tariff['descr'] !!}</div>
                <div class="d-flex justify-content-between align-items-center">
                    @auth
                        <button type="button" class="input-btn btn" style="border: 1px solid #666; color: #666;"
                            data-toggle="modal" data-target="#paymentModal">{{ __('website.buy') }}</button>
                    @else
                        <button type="button" class="input-btn btn" style="border: 1px solid #666; color: #666;"
                            data-toggle="modal" data-target="#loginOrRegisterModal">{{ __('website.buy') }}</button>
                    @endauth
                    <h4 class="text-right"><b>{{ __('website.price') }}: {{ $tariff['price'] }}
                            {{ __('website.currency') }}</b></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">{{ __('website.payment') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('images/click.png') }}" alt="click" width="80%" height="350px">
                    <form action="/order" method="POST" class="order-submit">
                        @csrf
                        <input type="hidden" name="tariff_id" value="{{ $tariff->id }}">
                        @auth
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        @endauth
                        <button type="submit" class="payment-btn btn btn-primary"
                            style="border: 1px solid #00f; color: #fff;">{{ __('website.payment_button') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Login or Register Modal -->
    <div class="modal fade" id="loginOrRegisterModal" tabindex="-1" role="dialog"
        aria-labelledby="loginOrRegisterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginOrRegisterModalLabel">{{ __('website.register.checkout') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! __('website.registerOrLogin') !!}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            @if (Auth::check())
                var urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('paymentModal')) {
                    $('#paymentModal').modal('show');
                }
            @endif
        });
    </script>
</x-layout>
