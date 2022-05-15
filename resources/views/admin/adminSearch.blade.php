@extends('layouts.masterA')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="clearfix">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admin All Bookings View</h4>
                            <div class="float-start">
                                <form name="search" action="{{ url('adminSearch') }}" method="GET">
                                    @csrf
                                    <input type="text" name="search" required/>
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                            <a href="{{ url('adminAllBookings') }}" class="btn btn-danger float-end">BACK</a>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Patient First Name</th>
                        <th>Patient Last Name</th>
                        <th>Dentist Name</th>
                        <th>Type of Appointment</th>
                        <th>Date of Appointment</th>
                        <th>Time of Appointment</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($returnSearch as $item)
                        <tr>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{ $item->d_first_name }}</td>
                            <td>{{ $item->type_of_appointment }}</td>
                            <td>{{ $item->date_of_appointment }}</td>
                            <td>{{ $item->time_of_appointment }}</td>
                            <td>
                                <a href="{{ url('editBooking/'.$item->id) }}"
                                   class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
