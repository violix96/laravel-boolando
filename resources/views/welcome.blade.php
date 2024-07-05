@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-33">
                    @foreach ($comix as $comixs)
                        <p>{{ $comixs['brand'] }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
