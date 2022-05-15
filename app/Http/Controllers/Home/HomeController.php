<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use function view;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date('Y-m-d');
        $currentUserBookings = Booking::leftJoin('dentist', 'dentist.id', '=', 'dentist_id')
            ->select('dentist.d_first_name', 'type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->where('user_id', Auth::user()->id)
            ->where('date_of_appointment', '>=', $date)
            ->orderBy('date_of_appointment', 'asc')
            ->paginate(10);


        return view('home', compact('currentUserBookings'));
    }
}
