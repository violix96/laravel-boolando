@extends('layouts.app')

@php
    function calcola_prezzo_scontato($price, $badges)
    {
        $discount = null;

        foreach ($badges as $badge) {
            if ($badge['type'] === 'discount') {
                $discount = $badge['value'];
                $discount = str_replace('-', '', $discount);
                $discount = (int) str_replace('%', '', $discount);
            }
        }
        if ($discount !== null && $discount > 0) {
            $discountedPrice = $price * (1 - $discount / 100);
            $discountedPrice = number_format(floor($discountedPrice * 100) / 100, 2);
            return $discountedPrice;
        } else {
            return number_format($price, 2);
        }
    }
@endphp



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
                            <div>
                                <span class="prezzo-ora">
                                    {{ calcola_prezzo_scontato($product['price'], $product['badges']) }} &euro;
                                    {{-- mostra il prezzo scontato --}}
                                </span>
                                @if (calcola_prezzo_scontato($product['price'], $product['badges']) !== $product['price'])
                                    <span class="discount-txt">{{ number_format($product['price'], 2) }} &euro;</span>
                                    {{-- mostra il prezzo originale con sconto --}}
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
