<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\RegisterOrder;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    // 测试
    public function index()
    {
        $mailData = [
            'title' => '账户激活邮件',
            'name'  => '你好啊',
            'url'   => env('APP_URL') . '/active?mail_id=' . 1111 . '&user_id=' . base64_encode(123),
        ];
        $mailMessage = (new RegisterOrder($mailData));
        Mail::to("292304400@qq.com")->queue($mailMessage);
    }
}
