<?php

namespace App\Providers;

use App\Models\Tenant;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        Gate::define('userActive', function (User $user) {
            $data = Tenant::with('payment')->where('user_id',$user->id)
            ->whereHas('payment',function($query){
                $query->where('statusPayment','Aktif');
            })->count();
            return $data > 0;
        });
    }
}
