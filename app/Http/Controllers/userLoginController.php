<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class userLoginController extends BaseController
{
    public function login(Request $req)
    {
        $username = $req->input('regno');
        $password = $req->input('pass');
        echo "$username";
    }
}
