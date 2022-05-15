@include('partial.header')

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
                        <a href="{{ url('adminAllBookings') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('updateBooking/'.$userBookings->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="Choose Dentist">Dentist:</label>
                        <select class="form-select" name="dentist_id">
                            @foreach($dentistN as $dFN)
                                <option value="{{$dFN->id}}">{{$dFN->d_first_name}}</option>
                            @endforeach
                        </select>

                        <div class="form-group mb-3">
                            <label for="choose_type">Type of Appointment:</label>
                            <select  class="form-select" name="type_of_appointment" value="{{$userBookings->type_of_appointment}}">
                                <option value="">Choose a Procedure</option>
                                <option value="Filling">Filling</option>
                                <option value="Check-Up">Check-Up</option>
                                <option value="Teeth-Whitening">Teeth-Whitening</option>
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
