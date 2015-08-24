<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Message;
use Method;
use Connection;
use Rule;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $request;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest', ['except' => 'postLogout']);// middleware sẽ loại bỏ không kiểm tra action getLogout.
        $this->request = $request;
    }

    public function getLogin()
    {
        return view('auth.login');// Hiển thị form cho người dùng nhập dữ liệu
    }
    /*
     * "email": "mrhung202@gmail.com",
     "password": "Abc123456"
     */

    public function postLogin(Request $request){
        $dataLogin = $request->only('email','password');// chỉ lấy 2 giá trị từ input form.

        $validator = Validator::make($dataLogin, Rule::login(), Message::vietnamese());// kiểm tra dữ liệu nhập vào
        if($validator->fails()){// Nếu dữ liệu nhập vào không thỏa mãn yêu cầu đặt ra.
            return redirect()->route('get.auth.auth.login')->withErrors($validator)->withInput();// quay về trang đăng nhập
        }
        // Dữ liệu thỏa mãn các yêu cầu đặt ra.
        $messageArrayFromSever = Method::httpPost(Connection::adminLogin(),$dataLogin);// nhận kết quả là chuỗi json sau khi gửi yêu cầu đến sever bằng phương thức post.
        if($messageArrayFromSever['code'] != 200){// Nếu dữ liệu người dùng nhập không đúng.
            return redirect()->route('get.auth.auth.login')->withInput($request->except('password'))->with('message_error', Message::wrongEmailOrPassword());// Quay lại trang đăng nhập.
        }
        /*=======Success login============*/
        Cookie::queue(Cookie::make('dataFromSever', $messageArrayFromSever, 59));
        session_start();
        $_SESSION['email'] = $dataLogin['email'];
        return redirect()->route('get.admin.home.dashboard_01'); // Chuyển người dùng vào trang chủ dành cho người quản lý
        /*========================================*/
    }

    public function postLogout(Request $request){
        session_start();
        session_destroy();
        $messageArrayFromSever = Method::httpPost(Connection::adminlogout(),false,true);
        if(isset($messageArrayFromSever['code']) && $messageArrayFromSever['code'] == 500){
            return "Internal error";
        }
        $cookie = Cookie::forget('dataFromSever');// Xóa toàn bộ session(lưu thông tin dữ liệu của người dùng)
        return redirect()->route('get.auth.auth.login')->withCookie($cookie);// Quay lại trang đăng nhập.
    }
    public function getForgetPassword(){
        return view('auth.forgotPassword');// Hiển thị biểu mẫu form cho người dùng nhập email.
    }

    public function postForgetPassword(Request $request){
        $email = $request->only('email');// chỉ nhập giá trị từ input email
        $validator = Validator::make($email, Rule::forgetPassword(), Message::vietnamese());// Kiểm tra dữ liệu mà người dùng nhập có thỏa mãn yêu cầu đặt ra không.
        if($validator->fails()){// Dữ liệu nhập vào không thỏa mãn yêu cầu đặt ra.
            return redirect()->route('get.auth.auth.forgetPassword')->withInput()->withErrors($validator);// CHuyển người dùng quay lại trang hiện thị form nhập email.
        }
        // do something below when success....
        $messageArrayFromSever = Method::httpPost(Connection::adminUserForgetPass(), $email);// Nhận kết quả trả về là 1 chuỗi json sau khi gửi yêu cầu đến sever bằng phương thức post
        // result sever response below....
        if($messageArrayFromSever['code'] == 200){// Email của người dùng nhập đúng.
            return redirect()->route('get.auth.auth.login')->with('message_success',"Chúc mừng bạn. Chúng tôi đã tìm được mật khẩu cho bạn. Vui lòng kiểm tra lại email của bạn");

        }elseif($messageArrayFromSever['code'] == 500){// Cập nhập mật khẩu thất bại.
            return redirect()->route('get.auth.auth.forgetPassword')->with('message_error',"Update password failed");

        }elseif($messageArrayFromSever['code'] == -1){// Gửi email bị lỗi
            return redirect()->route('get.auth.auth.forgetPassword')->with('message_error',"Send email error");

        }elseif($messageArrayFromSever['code'] == 404){// Email của người dùng nhập không tồn tại.
            return redirect()->route('get.auth.auth.forgetPassword')->with('message_error',"Email address does not exist");

        }else{// các trường hợp khác
            return redirect()->action('Auth\AuthController@getMessageResponseFromSever')->with('message_error',"<strong> Sever hiện đang cập nhập các trạng thái mới</strong>");

        }
        // redirect user to login form if dont have any code status ...
        return redirect()->route('get.auth.auth.forgetPassword');
    }

}
