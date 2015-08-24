<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/24/2015
 * Time: 10:24 AM
 */
namespace App\Repository\Facades;
use Illuminate\Support\Facades\Facade;

class ConnectionFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'Connection'; }
}