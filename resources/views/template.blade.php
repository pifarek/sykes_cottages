<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sykes Cottages</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            nav.navbar {
                margin-bottom: 30px;
            }
            .card {
                margin-bottom: 20px;
            }
        </style>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Sykes Cottages</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0" method="post" action="{{ route('results') }}">
                @method('POST')
                @csrf
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search Location" aria-label="Search" value="{{ old('search') }}">

                <div class="form-check mr-sm-2">
                    <input class="form-check-input" type="checkbox" value="1" checked id="near_the_beach" name="near_the_beach">
                    <label class="form-check-label" for="near_the_beach">
                        Near the beach
                    </label>
                </div>

                <div class="form-check mr-sm-2">
                    <input class="form-check-input" type="checkbox" value="1" checked id="accepts_pets" name="accepts_pets">
                    <label class="form-check-label" for="accepts_pets">
                        Accepts pets
                    </label>
                </div>

                <input type="number" class="form-control mr-sm-2" placeholder="Number of sleeps" min="1" max="10" name="sleeps" value="{{ old('sleeps') }}">

                <input type="number" class="form-control mr-sm-2" placeholder="Number of beds" min="1" max="10" name="beds" value="{{ old('beds') }}">

                <select class="form-control mr-sm-2" name="availability" value="{{ old('availability') }}">
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
        @yield('content')
    </body>
</html>
