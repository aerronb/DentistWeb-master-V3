@extends('layouts.masterA')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header container-fluid">
                    <h4>Admin Home View</h4>
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

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Number of all users:</h5>
                            <p class="card-text">{{$allUsersC}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Amount of Admin Users:</h5>
                            <p class="card-text">{{$allAdminC}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Earliest Appointment Today:</h5>
                            @isset($earliestAppQ)
                                <p class="card-text">Appointment with: <b>{{$earliestAppQ->name}}</b> on:
                                    <b>{{$earliestAppQ->date_of_appointment->format('d-M-Y')}}</b> at:
                                    <b>{{$earliestAppQ->time_of_appointment}} </b>
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Latest Appointment Today:</h5>
                            @isset($latestAppQ)
                                <p class="card-text">Appointment with: <b>{{$latestAppQ->name}}</b> on:
                                    <b>{{$latestAppQ->date_of_appointment->format('d-M-Y')}}</b> at:
                                    <b>{{$latestAppQ->time_of_appointment}} </b>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

