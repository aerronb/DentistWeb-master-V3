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
                        <a href="{{ url('admin_stats') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('updateInfo/'.$userInfo->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Change your name here:</label>
                            <input type="text" name="name" value="{{$userInfo->first_name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Change your last name here:</label>
                            <input type="text" name="name" value="{{$userInfo->last_name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Change your email here:</label>
                            <input type="email" name="email" value="{{$userInfo->email}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
