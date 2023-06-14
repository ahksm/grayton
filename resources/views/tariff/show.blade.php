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
                        <div class="d-flex" style="gap: 30px;">
                            <button type="button" class="input-btn btn" style="border: 1px solid #666; color: #666;"
                                data-toggle="modal" data-target="#paymentModal">{{ __('website.buy') }}</button>
                            <button type="button" class="input-btn btn" style="border: 1px solid #666; color: #666;"
                                data-toggle="modal" data-target="#bookingModal">{{ __('website.book') }}</button>
                        </div>
                    @else
                        <div class="d-flex" style="gap: 30px;">
                            <button type="button" class="input-btn btn" style="border: 1px solid #666; color: #666;"
                                data-toggle="modal" data-target="#loginOrRegisterModal"
                                onclick="openPaymentModal('{{ url()->current() }}')">{{ __('website.buy') }}</button>
                            <button type="button" class="input-btn btn" style="border: 1px solid #666; color: #666;"
                                data-toggle="modal" data-target="#loginOrRegisterModal"
                                onclick="openBookingModal('{{ url()->current() }}')">{{ __('website.book') }}</button>
                        </div>
                    @endauth
                    <h4 class="text-right"><b>{{ __('website.price') }}: {{ $tariff['price'] }}
                            {{ __('website.currency') }}</b></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">{{ __('website.booking') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="bookingModalBody" class="modal-body text-center">
                    <p>{{ __('website.booking_text') }}</p>
                    <form action="/booking" method="POST" class="booking-submit">
                        @csrf
                        <input type="hidden" name="tariff_id" value="{{ $tariff->id }}">
                        @auth
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        @endauth
                        <button type="submit" class="booking-btn btn btn-primary"
                            style="border: 1px solid #00f; color: #fff;">{{ __('website.booking_button') }}</button>
                    </form>
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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            @if (Auth::check())
                var urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('modal') === 'paymentModal') {
                    $('#paymentModal').modal('show');
                } else if (urlParams.get('modal') === 'bookingModal') {
                    $('#bookingModal').modal('show');
                }
            @endif
        });

        function openPaymentModal(url) {
            setUrlIntended(url, 'paymentModal');
        }

        function openBookingModal(url) {
            setUrlIntended(url, 'bookingModal');
        }

        function setUrlIntended(url, modal) {
            var token = $('meta[name="csrf-token"]').attr('content');
            var headers = {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            };

            fetch('{{ route('setUrlIntended') }}', {
                    method: 'POST',
                    headers: headers,
                    body: JSON.stringify({
                        url: url + `?modal=${modal}`
                    })
                })
                .then(function(response) {})
                .catch();
        }
    </script>
</x-layout>
