@include('partial.header')

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card-header">{{ __('Booking For') }} {{ Auth::user()->first_name}}
                    <a href="{{ url('home') }}" class="btn btn-danger float-end">BACK</a>
                </div>

                <div class="card-body">
                    <b>Please add a new booking below</b>
                    <form name="add-user-form" action="{{ url('store-user-form') }}" method="POST">
                        @csrf
                        <label for="Choose Dentist">Dentist:</label>
                        <select class="form-select" name="dentist_id">
                            @foreach($dentistN as $dFN)
                                <option value="{{$dFN->id}}">{{$dFN->d_first_name}}</option>
                            @endforeach
                        </select>

                        <label for="choose_type">Type of Appointment:</label>
                        <select  class="form-select" name="type_of_appointment">
                            <option value="">Choose a Procedure</option>
                            <option value="Filling">Filling</option>
                            <option value="Check-Up">Check-Up</option>
                            <option value="Teeth-Whitening">Teeth-Whitening</option>
                            <option value="Braces">Braces</option>
                            <option value="Implant">Implant</option>
                            <option value="Dentures">Dentures</option>
                            <option value="Veneers">Veneers</option>
                        </select>

                        <div>
                            <label> Add a date for your appointment:</label>
                            <input class="form-control" type="date" name="date_of_appointment">
                        </div>

                        <div>
                            <label> Add a time for your appointment:</label>
                            <input class="form-control" type="time" name="time_of_appointment" min="07:00" max="22:00">
                        </div>

                        </br>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Book') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

