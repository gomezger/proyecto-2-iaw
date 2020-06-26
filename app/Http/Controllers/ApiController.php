<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RepoUser;

class ApiController extends Controller
{
    public function cursadas(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "cursadas" => $user->cursadas()
        );

        return response()->json($data);
    }

    public function aprobadas(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "aprobadas" => $user->aprobadas()
        );

        return response()->json($data);
    }


}
