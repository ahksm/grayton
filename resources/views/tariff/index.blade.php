<x-layout :locations="$locations">
    <div class="container" style="margin: 100px auto">
        <div class="row">
            @foreach ($tariffs as $tariff)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center flex-column">
                            <img src="{{ asset('storage/' . $tariff['image']) }}" alt="alt">
                            <h5 class="card-title mt-3">{{ $tariff['name'] }}</h5>
                            <p class="card-text">Price: ${{ $tariff['price'] }}</p>
                            <div class="card-descr text-center">{!! $tariff['descr'] !!}</div>
                            <a href="/tariffs/{{ strtolower($tariff['name']) }}" class="btn mt-3" style="border: 1px solid #666; color: #666;">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
