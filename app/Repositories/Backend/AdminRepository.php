<?php
namespace App\Repositorys\Backend;

use App\Models\Admin;
use App\Models\AdminPermission;

class AdminRepository extends BaseRepository
{

    /**
     * 获取列表
     */
    public function lists($input)
    {
        $this->data['lists']      = Admin::lists($input['searchForm']);
        $this->data['permission'] = AdminPermission::all();
        $this->dicts     = Parent::getDicts(['status']);
        return [
            'status'  => $this->status,
            'data'    => $this->data,
            'dicts' => $this->dicts,
            'message' => $this->message,
        ];
    }

    /**
     * 新增
     */
    public function create($input)
    {
        $usernameUniqueData = Admin::where('username', $input['username'])->first();
        if (!empty($usernameUniqueData)) {
            return [
                'status'  => 0,
                'data'    => '',
                'message' => '管理员用户名已经存在',
            ];
        }
        $emailUniqueData = Admin::where('email', $input['email'])->first();
        if (!empty($emailUniqueData)) {
            return [
                'status'  => 0,
                'data'    => '',
                'message' => '管理员邮箱已经存在',
            ];
        }
        $insert = Admin::create([
            'username'      => $input['username'],
            'email'         => $input['email'],
            'password'      => md5($input['password'] . env('APP_PASSWORD_ENCRYPT')),
            'permission_id' => $input['permission_id'],
            'status'        => $input['status'],
        ]);
        if (!$insert) {
            return [
                'status'  => $this->errorStatus,
                'data'    => '',
                'message' => '未知错误，数据新增失败',
            ];
        }
        return [
            'status'  => $this->successStatus,
            'data'    => '',
            'message' => '数据新增成功',
        ];
    }

    /**
     * 编辑
     */
    public function update($input)
    {
        $adminData = Admin::where('id', $input['id'])->first();
        if (empty($adminData)) {
            return [
                'status'  => 0,
                'data'    => '',
                'message' => '管理员不存在',
            ];
        }
        $usernameUniqueData = Admin::where('id', '!=', $input['id'])->where('username', $input['username'])->first();
        if (!empty($usernameUniqueData)) {
            return [
                'status'  => 0,
                'data'    => '',
                'message' => '管理员用户名已经存在',
            ];
        }
        $emailUniqueData = Admin::where('id', '!=', $input['id'])->where('email', $input['email'])->first();
        if (!empty($emailUniqueData)) {
            return [
                'status'  => 0,
                'data'    => '',
                'message' => '管理员邮箱已经存在',
            ];
        };
        $updateData = [
            'username'      => $input['username'],
            'email'         => $input['email'],
            'permission_id' => $input['permission_id'],
            'status'        => $input['status'],
        ];
        if ($input['password']) {
            $updateData['password'] = md5($input['password'] . env('APP_PASSWORD_ENCRYPT'));
        };
        $update = Admin::where('id', $input['id'])->update($updateData);
        return [
            'status'  => $update ? 1 : 0,
            'data'    => '',
            'message' => $update ? '数据更新成功' : '数据更新失败',
        ];
    }

    /**
     * 删除
     */
    public function delete($id)
    {
        $deleted = Admin::where('id', $id)->delete();
        return [
            'status'  => $deleted ? 1 : 0,
            'data'    => '',
            'message' => $deleted ? '删除成功' : '删除失败',
        ];
    }
}
