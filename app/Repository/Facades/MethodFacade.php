<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/24/2015
 * Time: 12:45 PM
 */

namespace App\Repository\Facades;

use Illuminate\Support\Facades\Facade;

class MethodFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'Method'; }
}