@include('partial.header')

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Bookings For') }} {{ Auth::user()->first_name}}
                    <a href="{{ url('home') }}" class="btn btn-danger float-end">BACK</a>
                </div>

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card-body">
                    <b>Here are all your appointments:</b>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Dentist First Name</th>
                                <th>Type of Appointment</th>
                                <th>Date of Appointment</th>
                                <th>Time of Appointment</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($userBookings as $item)
                                <tr>
                                    <td>{{$item->d_first_name}}</td>
                                    <td>{{$item->type_of_appointment}}</td>
                                    <td>{{ $item->date_of_appointment->format('d-m-Y') }}</td>
                                    <td>{{ $item->time_of_appointment }}</td>
                                    <td>
                                        @if($item->date_of_appointment >= $today)
                                            <a href="{{url('deleteBooking/'.$item->id)}}" class="btn btn-danger primary">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <span>{{$userBookings->links('pagination::bootstrap-5')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
