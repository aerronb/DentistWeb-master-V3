<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class myBookingsController extends Controller
{
    public function index()
    {
        $userBookings = Booking::where('user_id', Auth::user()->id)->get();
        return view('bookings.myBookings', compact('userBookings'));
    }

    public function edit($id)
    {
        $userBookings = Booking::find($id);
        return view('bookings.edit', compact('userBookings'));
    }

    public function update(Request $request,$id)
    {
        $userBookings = Booking::find($id);
        $userBookings->dentist = $request->input('dentist');
        $userBookings->type_of_appointment = $request->input('type_of_appointment');
        $userBookings->date_of_appointment = $request->input('date_of_appointment');
        $userBookings->time_of_appointment = $request->input('time_of_appointment');
        $userBookings->update();
        return redirect()->back()->with('status', 'Appointment updated');

    }
}
