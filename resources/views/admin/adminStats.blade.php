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
                        <h4>Admin Statistics</h4>
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
                                    @if (Route::has('newAdmin'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{ route('newAdmin') }}">{{ __('New Admin') }}</a>
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
                                <h5 class="card-title">Last Created Admin was:</h5>
                                @isset($newestAdmin)
                                <p class="card-text">{{$newestAdmin->first_name}}
                                @endisset
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Admin added in the last month:</h5>
                                <p class="card-text">{{$lastMonthA}}
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($allAdmin as $item)
                        <tr>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if($item->id == Auth::user()->id)
                                    <a href="{{ url('editInfo/'.$item->id) }}"
                                       class="btn btn-primary primary">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    <span>{{$allAdmin->links('pagination::bootstrap-5')}}</span>
            </div>
        </div>
    </div>
@endsection
