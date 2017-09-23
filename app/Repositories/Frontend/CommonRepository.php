<?php
namespace App\Repositories\Frontend;

use App\Mail\RegisterOrder;
use Illuminate\Support\Facades\Mail;

class CommonRepository extends BaseRepository
{

    /**
     * 保存图片
     * @param  Array $input 上传的文件
     * @return Array
     */
    public function uploadImage($input)
    {
        $oldImagesName      = $input->getClientOriginalName();
        $imageExtensionName = $input->getClientOriginalExtension();
        $imageSize          = $input->getSize() / 1024; // 单位为KB
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
        $filedir       = "face/"; // 图片上传路径
        $uploadResult  = $input->move($filedir, $newImagesName);
        return [
            'status'  => !empty($uploadResult) ? Parent::SUCCESS_STATUS : Parent::ERROR_STATUS,
            'data'    => [
                'data' => [
                    'pathName' => !empty($uploadResult) ? $filedir : '',
                    'fileName' => !empty($uploadResult) ? $newImagesName : '',
                ],
            ],
            'message' => !empty($uploadResult) ? '头像上传成功' : '头像上传失败',
        ];
    }

    public function sendEmail($input)
    {
        return true;
        $mailData = [
            'title' => '账户激活邮件',
            'name'  => '你好啊',
            'url'   => env('APP_URL') . '/active?mail_id=' . 1111 . '&user_id=' . base64_encode(123),
        ];
        $mailMessage = (new RegisterOrder($mailData));
        Mail::to("292304400@qq.com")->queue($mailMessage);
    }
}
