<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/23/2015
 * Time: 5:17 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

use Connection;
use Cookie;
class HomeController extends Controller
{
	public function __construct(){
		
	}

    public function getDashboard01(){
    

        return view('admin.home.dashboard_01')->with('titlePage','Aiko | Dashboard 01');
    }

    public function getDashboard02(){
        return view('admin.home.dashboard_02')->with('titlePage','Aiko | Dashboard 02');
    }
}