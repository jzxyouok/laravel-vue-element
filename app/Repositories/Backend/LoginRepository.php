<?php
namespace App\Repositories\Backend;

use DB;
use Illuminate\Support\Facades\Auth;

class LoginRepository extends BaseRepository
{

    /**
     * 登录
     */
    public function login($data, $login_ip)
    {
        $loginData = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        if (!Auth('admin')->attempt($loginData)) {
            return [
                'status'  => 0,
                'message' => '用户名或密码错误111',
            ];
        }
        $adminData = Auth('admin')->user();
        if (!$adminData->status) {
            Auth::logout();
            return [
                'status'  => 0,
                'message' => '帐号被禁用',
            ];
        };
        $result = DB::update('update admins set last_login_ip = ? , last_login_time = ? where id = ?', [
            $login_ip, date('Y-m-d H:i:s', time()), $adminData->id,
        ]);
        $this->status        = isTrueOrFalse($result);
        $this->data['admin'] = [
            'username' => $adminData->username,
            'email'    => $adminData->email
        ];
        $this->message = isTrueOrFalse($result) ? '登录成功': '发生未知错误';
        return [
            'status'  => $this->status,
            'data'    => $this->data,
            'message' => $this->message
        ];
    }

    /**
     * 退出
     */
    public function logout($request)
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return [
            'status'  => 1,
            'message' => '管理员退出成功',
        ];
    }
}
