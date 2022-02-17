<?php

namespace App\Http\Controllers;

// php artisan make:controller ProvisionServer --invokable

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Exception;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function comparePassword($password, $hash){
        if(password_verify($password, $hash))
            return 1;
        return 0;
    }
}
