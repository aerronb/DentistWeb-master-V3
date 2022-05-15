@extends('layouts.masterA')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header container-fluid">
                    <h4>Customer Statistics</h4>
                </div>
            </div>

            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ 'Dentist Clinic' }}
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                <form name="search" action="{{ url('adminSearch') }}" method="GET">
                                    @csrf
                                    <input type="text" name="search" required/>
                                    <button type="submit">Search</button>
                                </form>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                @if (Route::has('allBookings'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('allBookings') }}">{{ __('All Bookings') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users Created this Month:</h5>
                            <p class="card-text">{{$lastMonthC}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Last Updated Booking:</h5>
                            @isset($lastUpdated)
                                <p class="card-text">For: <b>{{$lastUpdated->first_name}}</b> on:
                                    <b>{{$lastUpdated->date_of_appointment->format('d-M-Y')}}</b>
                                    at: <b>{{$lastUpdated->updated_at->format('d-M-Y G:i:s a')}}</b>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Most Common Time Booked:</h5>
                            <p class="card-text"> {{$mostCommonTimeC->time_of_appointment}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Most Common Procedure Choice:</h5>
                            <p class="card-text">{{$mostCommonProcedure->type_of_appointment}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
