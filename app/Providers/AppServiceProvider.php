<?php

namespace App\Providers;
use App\Models\Booking;
use App\Models\PesanKontak;
use App\Models\Pengguna;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view){

        $view->with(
            'booking_masuk',
            Booking::where('status','1')->count()
        );

        $view->with(
            'pesan_masuk',
            PesanKontak::where('status_baca','0')->count()
        );

        $view->with(
            'pengguna_baru',
            Pengguna::where('status','1')->count()
        );

    });

    Paginator::useBootstrapFive();

    }


}
