<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/12/2015
 * Time: 1:04 PM
 */

namespace App\Repository;

class Message{
    private static $setVietnamese = array(
        'email.required'        => 'Vui lòng nhập địa chỉ email của bạn',
        'email'                 =>  "Vui lòng nhập đúng định dạng email",

        'username.required'     => 'Vui lòng nhập tên truy cập của bạn',

        'password.required'     => 'Vui lòng nhập mật khẩu của bạn',

        'repassword.same'       => 'Mật khẩu sử dụng và mật khẩu xác nhận phải trùng nhau',
        'repassword.required'   => 'Vui lòng nhập mật khẩu xác nhận của bạn',

        'name.required'         => 'Vui lòng nhập tên của bạn',
        'gender.required'       => 'Vui lòng chọn giới tính của bạn',
        'birthday.required'     => 'Vui lòng lựa chọn ngày sinh của bạn',
        'job.required'          => 'Vui lòng nhập tên công việc của bạn',
        'phone.required'        => 'Vui lòng nhập số điện thoại của bạn',
        'interest.required'     => 'Vui lòng nhập sở thích của bạn',
        'description.required'  => 'Vui lòng nhập miêu tả',
        'telephone.required'    => 'Vui lòng nhập số điện thoại',
    );
    public function vietnamese(){
        return static::$setVietnamese;
    }


    private static $wrongEmailOrPassword = 'Địa chỉ email hoặc mật khẩu không chính xác';
    public function wrongEmailOrPassword(){
        return static::$wrongEmailOrPassword;
    }

    private static $successLogin = 'Chúc mừng bạn đã đăng nhập thành công';
    public function successLogin(){
        return static::$successLogin;
    }
}