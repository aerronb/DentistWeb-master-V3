<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <div class="row">
        <div class="col-md-9">

            @if (session('status'))
                <h6 class="alert alert-dark">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Your Bookings
                        <a href="{{ url('myBookings') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('updateBooking/'.$userBookings->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="choose_dentist">Dentist name:</label>

                            <select class="form-select" name="dentist" value="{{$userBookings->dentist}}">
                                <option value="">Choose a Dentist</option>
                                <option value="Samira">Samira</option>
                                <option value="John">John</option>
                                <option value="Holly">Holly</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="choose_type">Type of Appointment:</label>

                            <select  class="form-select" name="type_of_appointment" value="{{$userBookings->type_of_appointment}}">
                                <option value="">Choose a Procedure</option>
                                <option value="Filling">Filling</option>
                                <option value="Check-Up">Check-Up</option>
                                <option value="Holly">Teeth-Whitening</option>
                                <option value="Braces">Braces</option>
                                <option value="Implant">Implant</option>
                                <option value="Dentures">Dentures</option>
                                <option value="Veneers">Veneers</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Change the date of your appointment here:</label>
                            <input type="text" name="date_of_appointment" value="{{$userBookings->date_of_appointment->format('d-m-Y')}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Change the time of your appointment here:</label>
                            <input type="text" name="time_of_appointment" value="{{$userBookings->time_of_appointment}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Booking</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
