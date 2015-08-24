<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/24/2015
 * Time: 7:13 PM
 */
namespace App\Repository\Facades;

use Illuminate\Support\Facades\Facade;

class RuleFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'Rule'; }
}