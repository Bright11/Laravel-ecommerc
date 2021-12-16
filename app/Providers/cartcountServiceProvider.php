<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
class cartcountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*',function ($view){
            $userId=Session::get('user')['id'];
            $total=cart::where('user_id',$userId)->count();
            return $view->with(['total'=>$total]);
        });
        //total price
        view()->composer('*',function($view){
            $user_id= Session::get('user')['id'];
            $sum =DB::table('carts')
            ->join('products','carts.prod_id','=','products.id')
            ->where('carts.user_id','=',$user_id)
            ->sum('products.price');
            return $view->with(['sum'=>$sum]);
        });

        
    }
}
