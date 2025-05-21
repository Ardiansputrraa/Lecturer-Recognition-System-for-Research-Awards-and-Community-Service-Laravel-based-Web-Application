<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Notifikasi;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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

    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $notifikasi = Notifikasi::where('user_id', Auth::user()->id)->get();
                $unreadCount = Notifikasi::where('user_id', Auth::user()->id)->where('status', "unread")->count();
                $view->with([
                    'notifikasi' => $notifikasi,
                    'unreadCount' => $unreadCount,
                ]);
            }
        });
    }
}
