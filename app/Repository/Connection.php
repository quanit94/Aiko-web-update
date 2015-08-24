<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/24/2015
 * Time: 7:28 AM
 */

namespace App\Repository;

class Connection
{
    private $host = 'http://128.199.179.202:6789/';

    private static $url = array(
        'adminLogin'                =>  'admin/authen/login',
        'adminLogout'               =>  'admin/authen/logout',
        'adminUserForgetPass'       =>  'admin/user/forgetpwd',

        'adminUserActivate'         =>  'admin/user/activate',
        'adminAddUser'              =>  'admin/user/add',
        'adminUserDeactivate'       =>  'admin/user/deactivate',
        'adminUserGetAllUser'       =>  'admin/user/list?page=-1',
        'adminUserGetById'          =>  'admin/user/get',
        'adminUserList'             =>  'admin/user/list',
        'adminUserRemove'           =>  'admin/user/remove',
        'adminUserUpdate'           =>  'admin/user/update',
        'adminUserSearch'           =>  'admin/user/search?query=',

        'addRestaurant'             =>  'addRestaurant',
        'restaurantGetList'         =>  'restaurant/getList',
        'restaurantDelete'          =>  'restaurant/delete/',

        'getPromotionOfRestaurant'  =>  'promotion/getPromoOfRestaurant?item_id=',
        'getPromotionById'          =>  'promotion/getPromotionById?promotion_id=',
        'addPromotion'              =>  'promotion/add',
        'updatePromotion'           =>  'promotion/update/',
        'deletePromotion'           =>  'promotion/delete/',

        'getRestaurantInfo'         =>  'getRestaurantInfo',

        'reviewGet'                 =>  'review/get?restaurant_id=',
    );

    public function host(){
        return $this->host;
    }
    /*=================== Authentication =========================================*/
    public function adminLogin(){
        return $this->host.static::$url['adminLogin'];
    }

    public function adminUserForgetPass(){
        return $this->host.static::$url['adminUserForgetPass'];
    }

    public function adminlogout(){
        return $this->host.static::$url['adminLogout'];
    }
    /*=================== End Authentication =========================================*/

    /*=================== User =========================================*/
    public function adminUserActivate($id = null){
        if($id != null){
            return $this->host.static::$url['adminUserActivate']."/$id";
        }
        return $this->host.static::$url['adminUserActivate'];
    }

    public function adminAddUser(){
        return $this->host.static::$url['adminAddUser'];
    }

    public function adminUserDeactivate($id = null){
        if($id != null){
            return $this->host.static::$url['adminUserDeactivate']."/$id";
        }
        return $this->host.static::$url['adminUserDeactivate'];
    }

    public function adminUserGetAllUser(){
        return $this->host.static::$url['adminUserGetAllUser'];
    }

    public function adminUserGetById($id = null){
        if($id != null){
            return $this->host.static::$url['adminUserGetById']."/$id";
        }
        return $this->host.static::$url['adminUserGetById'];
    }

    public function adminUserList($page){
        return $this->host.static::$url['adminUserList']."?page=".$page;
    }

    public function adminUserRemove($id = null){
        if($id != null){
            return $this->host.static::$url['adminUserRemove']."/$id";
        }
        return $this->host.static::$url['adminUserRemove'];
    }

    public function adminUserUpdate($id){
        return $this->host.static::$url['adminUserUpdate']."/$id";
    }

    public function adminUserSearch($query = null){
        if($query != null){
            return $this->host.static::$url['adminUserSearch']."$query";
        }
        return $this->host.static::$url['adminUserSearch'];
    }
    /*=================== End User =========================================*/

    /*=================== Restaurant =========================================*/
    public function addRestaurant($query = null){
        return $this->host.static::$url['addRestaurant'];
    }

    public function restaurantGetList($query = null){
        if($query != null){
            return $this->host.static::$url['restaurantGetList']."/$query";
        }
        return $this->host.static::$url['restaurantGetList'];
    }

    public function restaurantDelete($id){
        return $this->host.static::$url['restaurantDelete']."$id";  
    }
    /*=================== End Restaurant =========================================*/

    /*=================== Promotion =========================================*/
    public function getPromotionOfRestaurant($item_id){
        return $this->host.static::$url['getPromotionOfRestaurant'].$item_id;
    }

    public function getPromotionById($promotion_id){
        return $this->host.static::$url['getPromotionById'].$promotion_id;
    }

    public function addPromotion(){
        return $this->host.static::$url['addPromotion'];
    }
    public function updatePromotion($promotion_id){
        return $this->host.static::$url['updatePromotion'].$promotion_id;
    }
    public function deletePromotion($promotion_id){
        return $this->host.static::$url['deletePromotion'].$promotion_id;
    }
    /*=================== End Promotion =========================================*/

    /*=================== Review =========================================*/
    public function reviewGet($restaurant_id = null){
        if($restaurant_id != null){
            return $this->host.static::$url['reviewGet'].$restaurant_id;
        }
        return $this->host.static::$url['reviewGet'];
    }
    /*=================== End Review =========================================*/
}