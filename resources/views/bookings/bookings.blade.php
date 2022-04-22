<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card-header">{{ __('Booking For') }} {{ Auth::user()->name}}
                    <a href="{{ url('home') }}" class="btn btn-danger float-end">BACK</a>
                </div>


                <div class="card-body">
                    <b>Please add a new booking below</b>
                    <form name="add-form" action="{{ url('store-form') }}" method="POST">
                        @csrf

                        <label for="choose_dentist">Dentist name:</label>

                        <select class="form-select" name="dentist">
                            <option value="">Choose a Dentist</option>
                            <option value="Samira">Samira</option>
                            <option value="John">John</option>
                            <option value="Holly">Holly</option>
                        </select>

                        <label for="choose_type">Type of Appointment:</label>
                        <select  class="form-select" name="type_of_appointment">
                            <option value="">Choose a Procedure</option>
                            <option value="Filling">Filling</option>
                            <option value="Check-Up">Check-Up</option>
                            <option value="Teeth-Whitening">Teeth-Whitening</option>
                            <option value="Braces">Braces</option>
                            <option value="Implant">Implant</option>
                            <option value="Dentures">Dentures</option>
                            <option value="Veneers">Veneers</option>
                        </select>

                        <div>
                            <label> Add a date for your appointment:</label>
                            <input class="form-control" type="date" name="date_of_appointment">
                        </div>

                        <div>
                            <label> Add a time for your appointment:</label>
                            <input class="form-control" type="time" name="time_of_appointment">
                        </div>

                        </br>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Book') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

