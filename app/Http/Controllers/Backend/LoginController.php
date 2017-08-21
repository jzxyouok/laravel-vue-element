<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositorys\Backend\LoginRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends BaseController
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

    /**
     * 登录方法
     * @return json
     */
    public function login(Request $request)
    {
        $input  = $request->input('data');
        $result = LoginRepository::getInstance()->login($input, $request->getClientIp());
        return response()->json($result);
    }
}
