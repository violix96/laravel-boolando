@extends('layouts.app')

@section('content')
    <main>
        <div class="container mt-5">
            <div class="row">
                @foreach ($comix as $product)
                    <div class="col-33">
                        <div class="content">
                            <div>
                                <img class="main-img" src="{{ Vite::asset('resources/img/' . $product['frontImage']) }}"
                                    alt="{{ $product['name'] }}">
                                <img class="hover-img" src="{{ Vite::asset('resources/img/' . $product['backImage']) }}"
                                    alt="{{ $product['name'] }} back image">
                                <div class="absolute">
                                    @foreach ($product['badges'] as $badge)
                                        @if ($badge['type'] == 'discount')
                                            <span class="sconti-label">{{ $badge['value'] }}</span>
                                        @elseif ($badge['type'] == 'tag')
                                            <span class="sostenibilità-label">{{ $badge['value'] }}</span>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="content-like">
                                    <span class="cuoricino">&#9829;</span>
                                </div>
                            </div>
                            <p>{{ $product['brand'] }}</p>
                            <h4>{{ $product['name'] }}</h4>
                            <span class="prezzo-ora">{{ $product['price'] }} &euro;</span>
                            <span class="prezzo-prima">
                                @foreach ($product['badges'] as $badge)
                                    @if ($badge['type'] == 'discount')
                                        {{ $badge['value'] }}
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
