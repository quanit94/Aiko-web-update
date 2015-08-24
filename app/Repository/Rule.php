<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/24/2015
 * Time: 7:13 PM
 */
namespace App\Repository;

class Rule{
    private static $login = array(
        "email"     => "required",
        "password"  => "required",
    );

    private static $adminUserAdd = array(
        "name"      =>  "required",
        "email"     =>  "required|email",
        "password"  =>  "required",
        "repassword"=>  "required|same:password",
    );

    private static $forgetPassword = array(
        "email"     =>  "required|email",
    );  

    public function login()
    {
        return static::$login;
    }

    public function adminUserAdd()
    {
        return static::$adminUserAdd;
    }

    public function forgetPassword()
    {
        return static::$forgetPassword;
    }
}