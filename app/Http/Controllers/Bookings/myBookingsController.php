<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Dentist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class myBookingsController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $id = Auth::id();

        $userBookings = Booking::leftJoin('dentist', 'dentist.id', '=', 'dentist_id')
            ->select('bookings.id', 'd_first_name', 'type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->where('user_id', $id)
            ->orderby('date_of_appointment', 'asc')
            ->paginate(10);
        return view('bookings.myBookings', compact('userBookings' , 'today'));
    }



    public function deleteBooking($id)
    {
        $deleteBooking = Booking::find($id);
        $deleteBooking->delete();
        return redirect()->back()->with('status', 'Deleted Booking');
    }


}
