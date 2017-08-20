<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\ClerkRepository;
use App\Repositorys\Backend\LoginRepository;
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
        $this->middleware('auth', ['only' => ['signout']]);
        // $this->beforeFilter('csrf', array('on' => 'post'));
    }

    // 登录界面
    public function index()
    {
        return view('login');
    }

    // 登录
    public function login(Request $request)
    {
        $input  = $request->input('data');
        $result = LoginRepository::getInstance()->login($input);
        return response()->json($result);
    }

    // 注销
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return;
    }

    public function reset(Request $request)
    {
        $result = ClerkRepository::reset($request->input('data'));
        return response($result['data'], $result['status']);
    }
}
