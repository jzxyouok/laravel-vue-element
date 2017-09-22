<?php
namespace App\Repositories\Backend;

use App\Models\Admin;
use App\Models\AdminPermission;

class AdminRepository extends BaseRepository
{

    /**
     * 获取列表
     */
    public function lists($input)
    {
        $resultData['lists'] = Admin::lists($input['searchForm']);
        $resultData['permissionOptions'] = AdminPermission::where('status', 1)->get();
        return [
            'status'  => Parent::SUCCESS_STATUS,
            'data'    => $resultData,
            'message' => '数据获取成功',
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
                'status'  => Parent::ERROR_STATUS,
                'data'    => $this->data,
                'message' => '管理员用户名已经存在',
            ];
        }
        $emailUniqueData = Admin::where('email', $input['email'])->first();
        if (!empty($emailUniqueData)) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => $this->data,
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
        return [
            'status'  => $insert ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $insert ? '管理员新增成功' : '管理员新增失败',
        ];
    }

    /**
     * 编辑
     */
    public function update($input, $id)
    {
        $adminData = Admin::where('id', $id)->first();
        if (empty($adminData)) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => $this->data,
                'message' => '管理员不存在',
            ];
        }
        $usernameUniqueData = Admin::where('id', '!=', $id)->where('username', $input['username'])->first();
        if (!empty($usernameUniqueData)) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => $this->data,
                'message' => '管理员用户名已经存在',
            ];
        }
        $emailUniqueData = Admin::where('id', '!=', $id)->where('email', $input['email'])->first();
        if (!empty($emailUniqueData)) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => $this->data,
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
        $update = Admin::where('id', $id)->update($updateData);
        return [
            'status'  => $update ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $update ? '管理员更新成功' : '管理员更新失败',
        ];
    }

    /**
     * 删除
     */
    public function delete($id)
    {
        $deleted = Admin::where('id', $id)->delete();
        return [
            'status'  => $deleted ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $deleted ? '管理员删除成功' : '管理员删除失败',
        ];
    }

    /**
     * 改变状态
     */
    public function changeFieldValue($id, $data)
    {
        $result = Admin::where('id', $id)->update([$data['field'] => $data['value']]);
        return [
            'status'  => $result ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $result ? '更改状态成功' : '更改状态失败',
        ];
    }
}
