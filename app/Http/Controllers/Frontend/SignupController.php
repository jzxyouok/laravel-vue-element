<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\SignupRepository;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function uploadFace(Request $request)
    {
        $input  = $request->file('file');
        $result = SignupRepository::getInstance()->uploadFace($input);
        return response()->json($result);
    }

    public function createUser(Request $request)
    {
        $input  = $request->input('data');
        $result = SignupRepository::getInstance()->createUser($input);
        return response()->json($result);
    }

    public function activeUser(Request $request)
    {
        $input  = $request->all();
        $result = SignupRepository::getInstance()->activeUser($input);
        return response()->json($result);
    }
}
