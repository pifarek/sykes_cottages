@extends('template')

@section('content')

    <div class="container">

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @else
        <div class="alert alert-warning">Enter search criteria above.</div>
    @endif

    </div>

@endsection