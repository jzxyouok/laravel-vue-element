<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\ClerkRepository;
use App\Repositories\Backend\LoginRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('auth', ['only' => ['adminLogout', 'userLogout']]);
        // $this->beforeFilter('csrf', array('on' => 'post'));
    }

    // 后台登录界面
    public function index()
    {
        return view('backend.index');
    }

    // 后台登录
    public function adminLogin(Request $request)
    {
        $input  = $request->input('data');
        $result = LoginRepository::getInstance()->login($input, $request->getClientIp());
        return response()->json($result);
    }

    // 后台注销
    public function adminLogout()
    {
        if (Auth('admin')::check()) {
            Auth('admin')::logout();
        }
        return response()->json(['status' => 1, 'message' => '退出成功']);
    }

    //
    public function adminReset(Request $request)
    {
        $result = LoginRepository::getInstance()->reset($request->input('data'));
        return response()->json($result);
    }
}
