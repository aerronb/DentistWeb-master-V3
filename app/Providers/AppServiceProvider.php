<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

            $dentist1Name = Booking::leftjoin('dentist', 'dentist.id', '=', 'dentist_id')
                ->select('d_first_name', 'dentist_id')
                ->where('dentist_id', '=', '1')
                ->first();
            View::share('dentist1Name', $dentist1Name);

            $dentist2Name = Booking::leftjoin('dentist', 'dentist.id', '=', 'dentist_id')
                ->select('d_first_name', 'dentist_id')
                ->where('dentist_id', '=', '2')
                ->first();
                View::share('dentist2Name', $dentist2Name);

            $dentist3Name = Booking::leftjoin('dentist', 'dentist.id', '=', 'dentist_id')
                ->select('d_first_name', 'dentist_id')
                ->where('dentist_id', '=', '3')
                ->first();
                View::share('dentist3Name', $dentist3Name);

    }
}
