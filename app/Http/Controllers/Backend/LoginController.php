<?php
namespace App\Http\Controllers\Backend;

use App\Repositorys\Backend\LoginRepository;
use Illuminate\Http\Request;

class LoginController extends BaseController
{

    /**
     * 登录方法
     * @return json
     */
    public function login(Request $request)
    {
        $input  = $request->input('data');
        $result = LoginRepository::getInstance()->login($request, $input);
        return response()->json($result);
    }
}
