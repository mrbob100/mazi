<?php

namespace Corp\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Blade;
use Config;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /*DB::listen( function ($query){
        dump($query->sql);
           dump($query->bindings);
       });  */
        Blade::directive('set', function ($exp){
            list($name,$val)=explode(',',$exp);
            return "<?php $name=$val ?>";
        });
        Blade::directive('setArray', function ($exp){
            list($name,$val)=explode(',',$exp);
            $item=Config::get('settings.handbook')[ $val];
            $items=explode(',',$item);
            return "<?php $name=$items ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
