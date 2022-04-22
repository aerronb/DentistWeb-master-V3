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
        $currentUserBookings = Booking::select('dentist', 'type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->where('user_id', Auth::user()->id)
            ->where('date_of_appointment', '>=', $date)
            ->get();

        return view('home', compact('currentUserBookings'));
    }

}
