<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
            ->select('name', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->orderBy('time_of_appointment', 'ASC')
            ->first();

        $latestAppQ = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->orderBy('time_of_appointment', 'DESC')
            ->first();


        return view('admin.adminView',
            compact('allUsersC', 'latestAppQ', 'allAdminC', 'earliestAppQ',));
    }

    public function tableJoin()
    {
        $allBookings=Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('bookings.id', 'name', 'dentist','type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->get();

        return view('admin.adminAllBookings', compact('allBookings'));


    }

    public function search(Request $request)
    {

        $search = $request->input('search');

        $returnSearch = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'dentist','type_of_appointment', 'date_of_appointment', 'time_of_appointment')
            ->where('name', 'like', "%{$search}%")
            ->orWhere('dentist', 'like', "%{$search}%")
            ->orWhere('type_of_appointment', 'like', "%{$search}%")
            ->orWhere('date_of_appointment', 'like', "%{$search}%")
            ->orWhere('time_of_appointment', 'like', "%{$search}%")
            ->get();



        return view('admin.adminSearch', compact('returnSearch'));
    }

    public function customerStats()
    {
        $current = Carbon::now();

        $lastMonthD = $current->subDays(30);

        $lastMonthC = User::select('id', 'created_at')
            ->where('created_at', '>=', $lastMonthD)
            ->count();

        $lastUpdated = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'type_of_appointment', 'date_of_appointment', 'time_of_appointment', 'bookings.updated_at')
            ->where('bookings.updated_at', '>=', $current)
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
        $allAdmin=User::select('id', 'name', 'email')
            ->where('user_type', '=', 'admin')
            ->get();

        return view ('admin.adminStats', compact('allAdmin'));
    }

    public function edit($id)
    {
        $userInfo = User::find($id);
        return view('admin.editAdmin', compact('userInfo'));
    }

    public function update(Request $request,$id)
    {
        $userInfo = User::find($id);
        $userInfo->name = $request->input('name');
        $userInfo->email = $request->input('email');
        $userInfo->update();
        return redirect()->back()->with('status', 'User information updated');

    }

    public function dentist_one()
    {
        $date = Carbon::today();

        $dentist1Name = Booking::where('dentist', '=', 'John')
            ->select('dentist')
            ->first();

        $dentist1AppE = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'dentist', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->where('dentist', '=', 'John')
            ->orderBy('time_of_appointment', 'DESC')
            ->first();

        $dentist1AppL = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'dentist', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->where('dentist', '=', 'John')
            ->orderBy('time_of_appointment', 'ASC')
            ->first();

        $dentist1CommonProcedure = Booking::select('type_of_appointment', 'dentist')
            ->where('dentist', '=', 'John' )
            ->groupBy('type_of_appointment', 'dentist')
            ->orderByRaw('COUNT(*) DESC')
            ->first();

        $dentist1LeastProcedure = Booking::select('type_of_appointment', 'dentist')
            ->where('dentist', '=', 'John' )
            ->groupBy('type_of_appointment', 'dentist')
            ->orderByRaw('COUNT(*) ASC')
            ->first();


        return view('admin.dentist_one',
            compact('dentist1AppE', 'dentist1AppL', 'dentist1CommonProcedure',
            'dentist1Name', 'dentist1LeastProcedure'));
    }

    public function dentist_two()
    {
        $date = Carbon::today();

        $dentist2Name = Booking::where('dentist', '=', 'Holly')
            ->select('dentist')
            ->first();

        $dentist2AppE = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'dentist', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->where('dentist', '=', 'Holly')
            ->orderBy('time_of_appointment', 'DESC')
            ->first();

        $dentist2AppL = Booking::leftJoin('users', 'users.id', '=', 'user_id')
            ->select('name', 'dentist', 'date_of_appointment', 'time_of_appointment')
            ->where('date_of_appointment', '=', $date)
            ->where('dentist', '=', 'Holly')
            ->orderBy('time_of_appointment', 'ASC')
            ->first();

        $dentist2CommonProcedure = Booking::select('type_of_appointment', 'dentist')
            ->where('dentist', '=', 'Holly' )
            ->groupBy('type_of_appointment', 'dentist')
            ->orderByRaw('COUNT(*) DESC')
            ->first();

        $dentist2LeastProcedure = Booking::select('type_of_appointment', 'dentist')
            ->where('dentist', '=', 'Holly' )
            ->groupBy('type_of_appointment', 'dentist')
            ->orderByRaw('COUNT(*) ASC')
            ->first();


        return view('admin.dentist_two',
            compact('dentist2AppE', 'dentist2AppL', 'dentist2CommonProcedure',
                'dentist2Name', 'dentist2LeastProcedure'));
    }



}
