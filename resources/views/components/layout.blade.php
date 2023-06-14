@php
    use App\Models\Location;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grayton Travel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light w-100" style="z-index: 2; border-bottom: 1px solid #CCC;">
        <div class="container">
            <a class="navbar-brand d-block" href="/">
                <img style="width: 40px" src="{{ asset('images/logo.svg') }}" alt="alt" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse"
                aria-controls="nav-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/" active>{{ __('website.navbar.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#destinations">{{ __('website.navbar.destinations') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tariffs">{{ __('website.navbar.tariffs') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about">{{ __('website.navbar.about') }}</a>
                    </li>
                    <li class="nav-item dropdown" style="min-width: max-content; margin-left: 35px">
                        <a class="nav-link dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-globe"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form action="{{ route('language.change') }}" method="POST">
                                @csrf
                                <button type="submit" name="locale" value="en" class="dropdown-item">EN</button>
                                <button type="submit" name="locale" value="ru" class="dropdown-item">RU</button>
                                <button type="submit" name="locale" value="uz" class="dropdown-item">UZ</button>
                            </form>
                        </div>
                    </li>
                    @auth
                        <li class="nav-item dropdown" style="min-width: 50px; margin-left: 35px">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form id="logout-form" action="/logout" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                        onclick="document.getElementById('logout-form').submit();">{{ __('website.navbar.signout') }}</a>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item mr-2">
                            <a class="nav-link btn" style="border: 1px solid #666; color: #666;"
                                href="{{ route('login') }}">{{ __('website.navbar.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" style="border: 1px solid #666; color: #666;"
                                href="{{ route('register') }}">{{ __('website.navbar.register') }}</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <div class="footer">
        <div class="container">
            <div class="row" style="margin-bottom: 80px; gap: 60px">
                <div class="col">
                    <a href="/">
                        <img src="{{ asset('images/logo.svg') }}" alt="alt"
                            style="width: 40px; margin-bottom: 25px" />
                    </a>
                    <p style="margin-bottom: 55px">
                        {{ __('website.footer.descr') }}
                    </p>
                    <p id="year"></p>
                </div>
                <div class="col">
                    <h5 style="margin-bottom: 20px">
                        {{ __('website.footer.destinations') }}
                    </h5>
                    <ul class="footer-links">
                        @php
                            $locations = Location::all();
                            $currentLocale = app()->getLocale();
                            $locationTranslations = $locations
                                ->map(function ($location) use ($currentLocale) {
                                    return collect($location->translations)->firstWhere('locale', $currentLocale) ?? collect($location->translations)->last();
                                })
                                ->filter();
                        @endphp
                        @foreach ($locationTranslations as $location)
                            @php
                                $country = Location::where('id', $location->location_id)->first();
                            @endphp
                            <li>
                                <a
                                    href="/location/{{ strtolower($country->country) }}">{{ ucfirst($location->country_translation) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d587.8910782882724!2d69.29024825058767!3d41.24870141898152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JrRg9GI0LrRg9GA0LPQvtC9IDQt0Lkg0L_RgNC-0LXQt9C0LCAxMDc!5e0!3m2!1sru!2s!4v1686675835189!5m2!1sru!2s"
                        width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <ul class="footer-links mt-3">
                        <b>41.248738, 69.290644</b>
                        <p>Sergeli, Tashkent, Uzbekistan</p>
                    </ul>
                </div>
            </div>
            <hr />
            <div class="row">
                <ul class="d-flex justify-content-center w-100 social-links" style="gap: 30px">
                    <li>
                        <a href="#" style="font-size: 24px">
                            <i class="fab fa-facebook" style="color: #000"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/ahksm/" style="font-size: 24px">
                            <i class="fab fa-instagram" style="color: #000"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/qkasm" style="font-size: 24px">
                            <i class="fab fa-telegram" style="color: #000"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        const selectedLocation = document.getElementById('selected-location');
        const hiddenLocation = document.getElementById('hidden-location');

        document.querySelectorAll('.some-dropdown-item').forEach(element => {
            element.addEventListener('click', (event) => {
                event.preventDefault();
                const location = event.target.dataset.location;
                selectedLocation.textContent = event.target.textContent;
                console.log(location);
                hiddenLocation.value = location;
            });
        });
    </script>
    <script src="https://my.click.uz/pay/checkout.js"></script>
    <script>
        window.onload = function() {
            document.querySelector('form.order-submit').addEventListener('submit', function(event) {
                event.preventDefault();
                var xhr = new XMLHttpRequest();
                xhr.open(this.method, this.action);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        createPaymentRequest({
                            service_id: 27913,
                            merchant_id: 20333,
                            amount: response.tariff_price,
                            transaction_param: response.order_id,
                            merchant_user_id: "32551",
                            card_type: "uzcard",
                        }, function(data) {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '/order');
                            xhr.setRequestHeader('Content-Type',
                                'application/x-www-form-urlencoded');
                            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content'));
                            var requestBody = `_method=PATCH&order_id=${response.order_id}`;
                            if (data.status != null) requestBody += `&status=${data.status}`;
                            xhr.send(requestBody);
                        });
                    }
                };
                xhr.send(new URLSearchParams(new FormData(this)).toString());
            });

            document.querySelector('form.booking-submit').addEventListener('submit', function(event) {
                event.preventDefault();
                var xhr = new XMLHttpRequest();
                xhr.open(this.method, this.action);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'));
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        document.querySelector('#bookingModalBody').innerHTML = xhr.status === 200 ?
                            `<div class="d-flex flex-column" style="gap: 50px">
                                <p>Booking was processed successfully, we will call you back later.</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">OK</span>
                                </button>
                            </div>` :
                            `<div class="d-flex flex-column" style="gap: 50px">
                                <p>Something went wrong!</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">OK</span>
                                </button>
                            </div>`;
                    }
                };
                xhr.send(new URLSearchParams(new FormData(this)).toString());
            });

            var currentYear = new Date().getFullYear();
            document.getElementById('year').innerHTML = '© ' + currentYear + ' Grayton Travel. All rights reserved.';
        };
    </script>
</body>

</html>
