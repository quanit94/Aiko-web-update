<?php
namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

use Connection;
use Cookie;
class HomeController extends Controller
{
    public function __construct(){

    }

    public function getDashboard01(){
        return view('partner.home.dashboard_01')->with('titlePage','Aiko | Dashboard 01');
    }
}