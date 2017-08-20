<?php
namespace App\Repositorys\Backend;

use Illuminate\Support\Facades\Auth;

class LoginRepository extends BaseRepository
{

    /**
     * 登录
     */
    public function login($data)
    {
        $loginData = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        if (!Auth('admin')->attempt($loginData)) {
            return [
                'status'  => 0,
                'message' => '用户名或密码错误',
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
        return [
            'status'  => 1,
            'data'    => [
                'admin' => [
                    'username' => $adminData->username,
                    'email'    => $adminData->email,
                ],
            ],
            'message' => '登录成功',
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
