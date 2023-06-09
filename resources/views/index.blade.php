<x-layout>
    <div class="header"
        style="background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
                url({{ asset('images/O9FG4R0.jpg') }});min-height: 100vh;
                background-position: center;
                background-repeat: no-repeat;">
        <div class="container" style="z-index: 1;">
            <div class="row" style="display: flex; justify-content: space-between; align-items: center;">
                <img class="col-lg-6" width="500px" src="{{ asset('images/Grayton logo black.png') }}" alt="alt" />
                <form class="col-lg-6" id="explore-form" method="POST" action="{{ route('explore') }}">
                    @csrf
                    <h5 style="color: #202336; font-size: 22px; line-height: 27px; margin-bottom: 21px;">
                        {{ __('website.header.header_text') }}
                    </h5>
                    <hr style="background: #202336; border-radius: 4px; width: 32px; height: 2px;" />
                    <div class="d-flex" style="gap: 30px; margin-bottom: 35px; width: 300px;">
                        <div class="dropdown w-100">
                            <button class="btn btn-light dropdown-toggle w-100 text-left" type="button" id="dropdown-1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="selected-location">{{ __('website.header.location') }}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown-1">
                                @foreach ($locationTranslations as $location)
                                    @php
                                        $country = $locations->where('id', $location->location_id)->pluck('country');
                                    @endphp
                                    <a class="some-dropdown-item dropdown-item" href="javascript:;"
                                        data-location="{{ strtolower($country[0]) }}">{{ ucfirst($location->country_translation) }}</a>
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" name="location" id="hidden-location">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark"
                            style="z-index: 1; padding: 11px 50px; font-family: MB; font-size: 17px; border: none; margin-top: 50px;">
                            {{ __('website.header.explore') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="destinations" id="destinations">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <h1 class="destinations-heading" style="line-height: 50px">
                    {{ __('website.destinations.featured') }}
                </h1>
                <a href="/tariffs" class="view-all">
                    {{ __('website.destinations.view') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </a>
            </div>
            <div class="row">
                @foreach ($tariffTranslations as $tariff)
                    @php
                        $city = $featured_tariffs->where('id', $tariff->tariff_id)->first();
                        $location = $locationTranslations->where('location_id', $city->location_id)->first();
                    @endphp
                    <div class="col-md-3 city"
                        style="background-image: url({{ asset('storage/' . str_replace('\\', '/', $city['image'])) }}); filter: grayscale(100%);">
                        <div class="info">
                            <h3>{{ ucfirst($tariff->name_translation) }}</h3>
                            <span>{{ ucfirst($location->country_translation) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="about" id="about"
        style="background-image: url({{ asset('images/london.jpg') }});
                min-height: 100vh;
                background-position: 20% 50%;
                background-repeat: no-repeat;">
        <div class="container">
            <div class="row" style="flex-direction: column">
                <div class="col">
                    <h1 style="line-height: 50px; margin-bottom: 20px; max-width: 400px;">
                        {{ __('website.about.heading') }}</h1>
                    <p style="width: 450px; font-size: 17px; line-height: 30px; color: #7d7987; font-family: ML;">
                        {{ __('website.about.text') }}
                    </p>
                    <button class="btn btn-dark"
                        style="z-index: 1; background: #333; padding: 11px 25px 13px; font-family: MB; font-size: 17px; border: none; margin-top: 30px; width: 165px;">
                        {{ __('website.about.button') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-layout>
