<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use function auth;
use function view;

class BookingController extends Controller
{
    public function index()
    {
        $userBookings = Booking::where('user_id', Auth::user()->id)->get();
        return view('bookings.bookings');
    }

    public function store(Request $request)
    {
        try {
            $booking = new Booking;
            $booking->user_id = auth()->id();
            $booking->dentist = $request->dentist;
            $booking->type_of_appointment = $request->type_of_appointment;
            $booking->date_of_appointment = $request->date_of_appointment;
            $booking->time_of_appointment = $request->time_of_appointment;
            $booking->save();
            $message = "Appointment Added";
        }catch(Exception $e){
            $message = 'Something went wrong';
        }
        return redirect()->back()->with('status', $message);
    }

}
