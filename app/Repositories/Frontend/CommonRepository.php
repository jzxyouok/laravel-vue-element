<?php
namespace App\Repositories\Frontend;

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
}
