@php
    use App\Models\Location;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grayton Travel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light w-100 position-absolute"
        style="z-index: 2; top: 0px; border-bottom: 1px solid #CCC">
        <div class="container">
            <a class="navbar-brand" href="#">
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
                    <li class="nav-item dropdown" style="min-width: 50px; margin-left: 35px">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ __('website.navbar.user') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <a class="dropdown-item" href="#">Profile</a> --}}
                            <form id="logout-form" action="/logout" method="POST">
                                @csrf

                                <a class="dropdown-item" href="#"
                                    onclick="document.getElementById('logout-form').submit();">{{ __('website.navbar.signout') }}</a>
                            </form>
                        </div>
                    </li>
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
                            $locations = Location::all()->take(4);
                            $currentLocale = app()->getLocale();
                            $locationTranslations = $locations
                                ->map(function ($location) use ($currentLocale) {
                                    $translation = collect($location->translations)->firstWhere('locale', $currentLocale);
                                    return $translation ?? collect($location->translations)->last();
                                })
                                ->filter();
                            
                        @endphp
                        @foreach ($locationTranslations as $location)
                            @php
                                $country = Location::where('id', $location->location_id)->first();
                                $slug = '';
                                foreach (json_decode($country['country']) as $key => $value) {
                                    $slug = $value;
                                }
                            @endphp
                            <li>
                                <a
                                    href="/locations/{{ strtolower($value) }}">{{ ucfirst($location->country_translation) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d324.5656112060904!2d69.30410466587887!3d41.245700835260045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1685956179408!5m2!1sen!2s"
                        width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <ul class="footer-links mt-3">
                        <b>41.245776, 69.304169</b>
                        <p>Kuylyuk-4, Tashkent, Uzbekistan</p>
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

        document.querySelector('.some-dropdown-item').addEventListener('click', (event) => {
            event.preventDefault();
            const location = event.target.dataset.location;
            selectedLocation.textContent = event.target.textContent;
            hiddenLocation.value = location;
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
                        var order_id = response.order_id;
                        var tariff_price = response.tariff_price;
                        createPaymentRequest({
                            service_id: 27913,
                            merchant_id: 20333,
                            amount: tariff_price,
                            transaction_param: order_id,
                            merchant_user_id: "32551",
                            card_type: "uzcard",
                        }, function(data) {
                            console.log("closed", data.status);
                            // Send another request to update the order status
                            var xhr = new XMLHttpRequest();
                            xhr.open('PATCH', '/order');
                            xhr.setRequestHeader('Content-Type',
                                'application/x-www-form-urlencoded');
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    // Handle successful update
                                } else {
                                    // Handle error
                                }
                            };
                            xhr.send(`order_id=${order_id}&status=${data.status}`);
                        });
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
