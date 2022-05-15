<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Dentist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $date = Carbon::today();

        $allUsersC = User::where('user_type', '=', 'patient')->count();
        $allAdminC = User::where('user_type', '=', 'admin')->count();


        $earliestAppQ = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('first_name', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->orderBy('time_of_appointment', 'ASC')
            ->first();

        $latestAppQ = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('first_name', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->orderBy('time_of_appointment', 'DESC')
            ->first();


        return view('admin.adminView',
            compact('allUsersC', 'latestAppQ', 'allAdminC',
                'earliestAppQ'));
    }

    public function tableJoin()
    {
        $allBookings=Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->leftJoin('dentist', 'dentist.id', '=', 'dentist_id')
            ->select('bookings.id', 'users.first_name', 'users.last_name', 'users.gender',
                'dentist.d_first_name','type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->paginate(10);

        return view('admin.adminAllBookings', compact('allBookings'));
    }

    public function deleteAdmin($id)
    {
        $deleteBooking = Booking::find($id);
        $deleteBooking->delete();
        return redirect()->back()->with('status', 'Deleted Booking');
    }

    public function search(Request $request)
    {

        $search = $request->input('search');

        $returnSearch = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->leftJoin('dentist', 'dentist.id', '=', 'dentist_id')
            ->select('users.first_name', 'users.last_name', 'dentist.d_first_name','type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "{$search}")
            ->orWhere('d_first_name', 'like', "%{$search}%")
            ->orWhere('type_of_appointment', 'like', "%{$search}%")
            ->orWhere('date_of_appointment', 'like', "%{$search}%")
            ->orWhere('time_of_appointment', 'like', "%{$search}%")
            ->get();



        return view('admin.adminSearch', compact('returnSearch'));
    }

    public function customerStats()
    {
        $current = Carbon::now();



        $lastMonthC = User::select('id', 'created_at')
            ->where('user_type', '=', 'patient')
            ->where('created_at', '>', Carbon::today()->startOfMonth())
            ->where('created_at', '<', Carbon::today()->endOfMonth())
            ->count();

        $lastUpdated = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('first_name', 'last_name', 'type_of_appointment', 'date_of_appointment', 'time_of_appointment', 'bookings.updated_at')
            ->where('bookings.updated_at', '>', Carbon::now())
            ->orderBy('bookings.updated_at', 'ASC')
            ->first();

        $mostCommonTimeC = Booking::select('time_of_appointment')
            ->groupBy('time_of_appointment')
            ->orderByRaw('COUNT(*) DESC')
            ->first();

        $mostCommonProcedure = Booking::select('type_of_appointment')
            ->groupBy('type_of_appointment')
            ->orderByRaw('COUNT(*) DESC')
            ->first();

        return view('admin.adminCustomerStats',
            compact('lastMonthC', 'lastUpdated', 'mostCommonTimeC', 'mostCommonProcedure'));
    }

    public function log_out()
    {
        Auth::logout();

        return redirect('/');
    }


    public function adminStats()
    {


        $lastMonthA = User::select('id', 'created_at')
            ->where('user_type', '=', 'admin')
            ->where('created_at', '>=', Carbon::today()->startOfMonth())
            ->where('created_at', '<=', Carbon::today()->endOfMonth())
            ->count();

        $allAdmin=User::select('id', 'first_name', 'last_name', 'email')
            ->where('user_type', '=', 'admin')
            ->paginate(5);

        $newestAdmin = User::select('id', 'created_at', 'first_name', 'user_type')
            ->where('user_type', '=', 'admin')
            ->where('created_at', '<=', Carbon::now())
            ->orderBy('created_at', 'DESC')
            ->first();

        return view ('admin.adminStats', compact('allAdmin', 'newestAdmin', 'lastMonthA'));
    }

    public function edit($id)
    {
        $userInfo = User::find($id);
        return view('admin.editAdmin', compact('userInfo'));
    }

    public function update(Request $req,$id)
    {
        $userInfo = User::find($id);
        $userInfo->first_name = $req->input('first_name');
        $userInfo->last_name = $req->input('last_name');
        $userInfo->email = $req->input('email');
        $userInfo->update();
        return redirect()->back()->with('status', 'User information updated');
    }

    public function editF($id)
    {
        $userBookings = Booking::find($id);
        $dentistN = Dentist::all();
        return view('bookings.edit',
            compact('userBookings', 'dentistN', $dentistN));
    }

    public function updateF(Request $request,$id)
    {
        $userBookings = Booking::find($id);
        $userBookings->dentist_id = $request->input('dentist_id');
        $userBookings->type_of_appointment = $request->input('type_of_appointment');
        $userBookings->date_of_appointment = $request->input('date_of_appointment');
        $userBookings->time_of_appointment = $request->input('time_of_appointment');
        $userBookings->update();
        return redirect()->back()->with('status', 'Appointment updated');
    }




}
