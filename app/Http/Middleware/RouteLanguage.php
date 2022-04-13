<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class RouteLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // public function changeLang($locale){
        //     if (!in_array($locale, ['en', 'jp'])) {
        //         abort(400);
        //         }
        //         App::setLocale($locale);
        //         return View('home.dashboard');
        //         
        // }
       
        if(session()->has('lang')){
            App::setLocale(session('lang'));
        }
        // Log::critical(
        //     $request->path()
        // );
        if($request->isMethod('get')){
            $array = explode("/",$request->path());
        // Log::critical("array",
        //     $array
        //    );
        // Log::critical("message",[session()->get('language')]);
      
        if (in_array(end($array), ['en', 'jp'])) {
            session(['lang'=>end($array)]);
            App::setLocale(session('lang'));
            array_pop($array);
            return redirect(implode('/',$array));
           
            
            // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            //  $randomString = '';
            //   for ($i = 0; $i < 12; $i++) 
            //    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                
            // return $randomString;

          }
        }
         
        return $next($request);
    }
}
