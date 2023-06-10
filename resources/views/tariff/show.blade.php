<x-layout>
    <div class="container" style="margin: 100px auto;">
        <div class="row justify-content-between">
            <img class="col-lg-4" src="{{ asset('storage/' . $tariff['image']) }}" alt="alt">
            <div class="col-lg-6">
                <h2 class="text-right"><b>{{ $tariff['name'] . ', ' . $tariff->location->country }}</b></h2>
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
                <div class="modal-body">
                    <form action="/order" method="POST" class="order-submit">
                        @csrf
                        <input type="hidden" name="tariff_id" value="{{ $tariff->id }}">
                        @auth
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        @endauth
                        <button type="submit"
                            class="payment-btn btn" style="border: 1px solid #666; color: #666;">{{ __('website.payment_button') }}</button>
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
                    <form action="/register" method="POST" class="login-or-register-submit d-flex flex-column" style="gap: 30px;">
                        @csrf
                        <input type="hidden" name="tariff_id" value="{{ $tariff->id }}">
                        @guest
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="text" name="name" placeholder="{{ __('website.register.name') }}" required>
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="text" name="surname" placeholder="{{ __('website.register.surname') }}" required>
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="email" name="email" placeholder="{{ __('website.register.email') }}" required>
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="number" name="phone" placeholder="{{ __('website.register.phone') }}" required>
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="text" name="address" placeholder="{{ __('website.register.address') }}" required>
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="password" name="password" placeholder="{{ __('website.register.password') }}" required>
                            <input class="btn text-left" style="border: 1px solid #666; color: #666;" type="password" name="password_confirmation"
                                placeholder="{{ __('website.register.password_confirmation') }}" required>
                        @endguest
                        <button type="submit"
                            class="login-or-register-btn btn" style="border: 1px solid #666; color: #666;">{{ __('website.register.button') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle successful form submission
        $('.order-submit').on('submit', function(event) {
            event.preventDefault();
            // Perform form submission using AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    // Show the payment modal after successful submission
                    $('#paymentModal').modal('show');
                },
                error: function(xhr) {
                    // Handle error if the form submission fails
                    console.log(xhr.responseText);
                }
            });
        });

        // Handle login or register form submission
        $('.login-or-register-submit').on('submit', function(event) {
            event.preventDefault();
            // Perform form submission using AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    // Show the payment modal after successful login or registration
                    $('#loginOrRegisterModal').modal('hide');
                    $('#paymentModal').modal('show');
                },
                error: function(xhr) {
                    // Handle error if the form submission fails
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
</x-layout>
