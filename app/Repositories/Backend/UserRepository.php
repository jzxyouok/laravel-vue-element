<?php
namespace App\Repositories\Backend;

use App\Models\User;

class UserRepository extends BaseRepository
{

    /**
     * 获取列表
     */
    public function lists($input)
    {
        $resultData['lists'] = User::lists($input['searchForm']);
        $dictLists           = Parent::getDicts(['status', 'active']);
        return [
            'status'  => Parent::SUCCESS_STATUS,
            'data'    => $resultData,
            'dicts'   => $dictLists,
            'message' => '数据获取成功',
        ];
    }

    /**
     * 新增
     */
    public function create($input)
    {
        $usernameUniqueData = User::where('username', $input['username'])->first();
        if (!empty($usernameUniqueData)) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => [],
                'message' => '用户用户名已经存在',
            ];
        }
        $emailUniqueData = User::where('email', $input['email'])->first();
        if (!empty($emailUniqueData)) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => [],
                'message' => '用户邮箱已经存在',
            ];
        }
        $insertResult = User::create([
            'username'      => $input['username'],
            'email'         => $input['email'],
            'password'      => md5($input['password'] . env('APP_PASSWORD_ENCRYPT')),
            'permission_id' => $input['permission_id'],
            'status'        => $input['status'],
        ]);
        return [
            'status'  => $insertResult ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $insertResult ? '用户新增成功' : '用户新增失败',
        ];
    }

    /**
     * 编辑
     */
    public function update($input, $id)
    {
        $UserData = User::where('id', $id)->first();

    }

    /**
     * 删除
     */
    public function delete($id)
    {
        $deleteResult = User::where('id', $id)->delete();
        return [
            'status'  => $deleteResult ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $deleteResult ? '用户删除成功' : '用户删除失败',
        ];
    }

    /**
     * 改变某条数据某一字段的值
     */
    public function changeFieldValue($id, $data)
    {
        $updateResult = User::where('id', $id)->update([$data['field'] => $data['value']]);
        return [
            'status'  => $updateResult ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [],
            'message' => $updateResult ? '操作成功' : '操作失败',
        ];
    }
}
