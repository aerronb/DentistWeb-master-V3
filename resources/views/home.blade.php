@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ ('Welcome') }} {{ Auth::user()->first_name}}

                        <div class="card-body">
                            <b>Here are your upcoming appointments:</b>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Dentist Name</th>
                                    <th>Type of Appointment</th>
                                    <th>Date of Appointment</th>
                                    <th>Time of Appointment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($currentUserBookings as $item)
                                    <tr>
                                        <td>{{ $item->d_first_name }}</td>
                                        <td>{{ $item->type_of_appointment }}</td>
                                        <td>{{ $item->date_of_appointment->format('d-m-Y') }}</td>
                                        <td>{{ $item->time_of_appointment }}</td>
                                    </tr>
                            @endforeach
                                </tbody>
                                </table>
                                <span>{{$currentUserBookings->links('pagination::bootstrap-5')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
