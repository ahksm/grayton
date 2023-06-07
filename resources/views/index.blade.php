<x-layout>
    <div class="header"
        style="background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
                url({{ asset('images/O9FG4R0.jpg') }});min-height: 100vh;
                background-position: center;
                background-repeat: no-repeat;">
        <div class="container"
            style="display: flex; flex-direction: column; justify-content: center; align-items: start; z-index: 1; height: 90vh;">
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
                                        $slug = '';
                                        foreach (json_decode($country[0]) as $key => $value) {
                                            $slug = $value;
                                        }
                                    @endphp
                                    <a class="some-dropdown-item dropdown-item" href="#"
                                        data-location="{{ $slug }}">{{ ucfirst($location->country_translation) }}</a>
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
                <h1 class="font-size-36" style="line-height: 50px">
                    {{ __('website.destinations.featured') }}
                </h1>
                <a href="/tariffs" class="view-all">
                    {{ __('website.destinations.view') }}
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
            <div class="row">
                @foreach ($tariffTranslations as $tariff)
                    @php
                        $city = $featured_tariffs->where('id', $tariff->tariff_id)->first();
                        $location = $locationTranslations->where('location_id', $city->location_id)->first();
                    @endphp
                    <div class="col-3 city"
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
                    <h1 class="font-size-36" style="line-height: 50px; margin-bottom: 20px; max-width: 400px;">
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
