@extends('template')

@section('content')

<div class="container">
    @if($properties->count())

    @foreach($properties as $property)
        <div class="card">
            <div class="card-body">
                <h2>{{ $property->property_name }}</h2>
                Location: {{ $property->location->location_name }}

                <hr>
                <div>
                    Near the beach: <strong>{{ $property->near_beach? 'Yes' : 'No' }}</strong> &middot;
                    Accepts pets: <strong>{{ $property->accepts_pets? 'Yes' : 'No' }}</strong> &middot;
                    Sleeps: <strong>{{ $property->sleeps }}</strong> &middot;
                    Beds: <strong>{{ $property->beds }}</strong>
                </div>
            </div>
        </div>
    @endforeach

    @else
        <div class="alert alert-warning">Sorry, we couldn't find anything.</div>
    @endif
</div>

@endsection