<x-layout>
    <div class="container" style="margin: 100px auto;">
        <div class="row justify-content-between">
            <img class="col-lg-4" src="{{ asset('storage/' . $tariff['image']) }}" alt="alt">
            <div class="col-lg-6">
                <h2 class="text-right"><b>{{ $tariff['name'] . ', ' . $tariff->location->country }}</b></h2>
                <div class="text-justify my-5">{!! $tariff['descr'] !!}</div>
                <div class="d-flex justify-content-between align-items-center">
                    <form action="/order" method="POST" class="order-submit">
                        @csrf

                        <input type="hidden" name="tariff_id" value="{{ $tariff->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <button type="submit" class="input-btn btn"
                            style="border: 1px solid #666; color: #666;">{{ __('website.buy') }}</button>
                    </form>
                    <h4 class="text-right"><b>{{ __('website.price') }}: {{ $tariff['price'] }}
                            {{ __('website.currency') }}</b></h4>
                </div>
            </div>
        </div>
    </div>
</x-layout>
