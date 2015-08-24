<?php
namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

use Connection;
use Method;
use Cookie;

class ReviewController extends Controllers {

	private $request;
	private $check;

	public function __construct() {
		$this->request = $request;
        $this->check = new \App\Http\Controllers\Partner\CheckController();
	}
	public function getReviewGet($id) {
		
		$arrayMessageFromSever = Method::httpGet(Connection::reviewGet($id), false, true);
		$result = $this->check -> reviewGet($arrayMessageFromSever);
		return $result;
	}
}