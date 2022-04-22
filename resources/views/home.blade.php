@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ ('Welcome') }} {{ Auth::user()->name}}

                        <div class="card-body">
                            <b>Here are your upcoming appointments:</b>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Dentist Name</th>
                                    <th>Type of Appointment</th>
                                    <th>Date of Appointment</th>
                                    <th>Time of Appointment</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($currentUserBookings as $item)
                                    <tr>
                                        <td>{{ $item->dentist }}</td>
                                        <td>{{ $item->type_of_appointment }}</td>
                                        <td>{{ $item->date_of_appointment->format('d-m-Y') }}</td>
                                        <td>{{ $item->time_of_appointment }}</td>
                                        <td>
                                            <a href="{{ url('editBooking/'.$item->id) }}"
                                               class="btn btn-primary disabled">Edit</a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger disabled">Delete</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
