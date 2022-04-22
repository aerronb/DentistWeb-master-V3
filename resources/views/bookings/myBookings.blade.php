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
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Bookings For') }} {{ Auth::user()->name}}
                    <a href="{{ url('home') }}" class="btn btn-danger float-end">BACK</a>
                </div>

                <div class="card-body">
                    <b>Please Select a booking to edit from below</b>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Dentist Name</th>
                            <th>Type of Appointment</th>
                            <th>Date of Appointment</th>
                            <th>Time of Appointment</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($userBookings as $item)
                            <tr>
                                <td>{{ $item->dentist }}</td>
                                <td>{{ $item->type_of_appointment }}</td>
                                <td>{{ $item->date_of_appointment->format('d-m-Y') }}</td>
                                <td>{{ $item->time_of_appointment }}</td>
                                <td>
                                    <a href="{{ url('editBooking/'.$item->id) }}"
                                       class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</tbody>
</table>

</body>
</html>
