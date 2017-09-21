<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\RegisterRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function createUser(Request $request)
    {
        $input  = $request->input('data');
        $result = RegisterRepository::getInstance()->createUser($input);
        return response()->json($result);
    }

    public function activeUser(Request $request)
    {
        $input  = $request->all();
        $result = RegisterRepository::getInstance()->activeUser($input);
        return response()->json($result);
    }
}
