<?php
namespace App\Repositories\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterOrder;
class SignupRepository extends BaseRepository
{
    public function uploadFace($input)
    {
        $oldImagesName      = $input->getClientOriginalName();
        $imageExtensionName = $input->getClientOriginalExtension();
        $imageSize = $input->getSize() / 1024; // 单位为KB
        if (!in_array(strtolower($imageExtensionName), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => [],
                'message' => '请上传正确的图片',
            ];
        }
        if ($imageSize > config('app.pictureSize')) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => [],
                'message' => '上传的图片不得大于500KB',
            ];
        }
        $newImagesName = md5(time()) . random_int(5, 5) . "." . $imageExtensionName;
        $filedir       = "images/"; // 图片上传路径
        $uploadResult  = $input->move($filedir, $newImagesName);
        return [
            'status'  => !empty($uploadResult) ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [
                'pathName' => !empty($uploadResult) ? $filedir : '',
                'fileName' => !empty($uploadResult) ? $newImagesName : '',
            ],
            'message' => !empty($uploadResult) ? '头像上传成功' : '头像上传失败',
        ];
    }

    public function createUser($input)
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
            'face'  => $input['face'],
            'password'      => md5($input['password'] . config('app.passwordEncrypt')),
            'active'        => 0,
            'status'        => 1,
        ]);
        if (!$insertResult) {
            return [
                'status'  => Parent::ERROR_STATUS,
                'data'    => [],
                'message' => '注册失败，未知错误',
            ];
        }
        $mailData = [
            'name' => $insertResult->username,
            'url' => env('APP_URL') . '/active?mail_id=1&user_id=' . base64_encode($insertResult->id) . '&username=' . $insertResult->username . '&code=' . base64_encode(rand(1000, 9999) . time() . rand(1000, 9999))
        ];
        Mail::to($insertResult->email)->send(new RegisterOrder($mailData));
        return [
            'status'  => Parent::SUCCESS_STATUS,
            'data'    => [
                'id' => base64_encode($insertResult->id),
                'username' => $insertResult->username,
                'email' => $insertResult->email,
            ],
            'message' => '注册成功，请于一小时内激活账号',
        ];
    }
}