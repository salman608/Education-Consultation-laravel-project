<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AllowedCorsOriginProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ( isset($_SERVER['REQUEST_METHOD'] ) && ($_SERVER['REQUEST_METHOD'] === 'OPTIONS')) {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
            header('Access-Control-Allow-Headers:  access-control-allow-origin,Access-Control-Allow-Headers,token, Content-Type');
            header('Access-Control-Max-Age: 1728000');
            header('Content-Length: 0');
            header('Content-Type: text/plain');
            die();
        }


        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
            // you want to allow, and if so:
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            //header('Access-Control-Max-Age: 86400');    // cache for 1 day
            header('Content-Type: multipart/form-data');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers,access-control-allow-origin');
        }
    }
}
