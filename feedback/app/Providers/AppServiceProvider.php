<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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

        Paginator::useBootstrap();

        Carbon::setLocale('KA');
            view()->composer('*', function ($view){
                if(Auth::check()){
                    $providerContact = Contact::first();
                    $providerCount = Message::where('reciver_id' , Auth::user()->id)->where('reciver_delete' , 0)->where('message_seen', 0)->count();
                    return $view->with(compact('providerCount', 'providerContact'));
                }
                $providerContact = Contact::first();
                return $view->with(compact('providerContact'));
            });
        }
    }


