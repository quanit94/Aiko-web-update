<!DOCTYPE html>
 <html>
   <head>
     <meta charset="UTF-8">
     <title>AikoAdmin | Log in</title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap 3.3.4 -->
     <link href="{{ url('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- Font Awesome Icons -->
     <link href="{{ url('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- Theme style -->
     <link href="{{ url('public/auth/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- iCheck -->
     <link href="{{ url('public/auth/css/blue.css') }}" rel="stylesheet" type="text/css" />

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
     @section('bonusCss')
     @show
   </head>
   <body class="login-page">
     <div class="login-box">
       <div class="login-logo">
         <a href="#"><b>Aiko</b></a>
       </div><!-- /.login-logo -->
       <div class="login-box-body">
         <small>Để đặt lại mật khẩu của mình, hãy nhập địa chỉ email mà bạn sử dụng để đăng nhập vào hệ thống. Địa chỉ email này có thể là địa chỉ Gmail, địa chỉ email Google Apps hoặc một địa chỉ email khác được liên kết với tài khoản của bạn.</small><hr>
         @include('message.message')
         {!! Form::open(array('route'=>array('post.auth.auth.forgetPassword'))) !!}
           {!! Form::hidden('provider','aiko', array('id'=>'provider')) !!}
           <div class="form-group has-feedback">
             {!! Form::email('email',old('email'),array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Nhập email của bạn')) !!}
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
           </div>
           <div class="row">
             <div class="col-xs-8">
               <div class="checkbox icheck">
                 <label>
                   {{--<input type="checkbox"> Remember Me--}}
                 </label>
               </div>
             </div><!-- /.col -->
             <div class="col-xs-4">
               {!! Form::submit('Xác nhận',array('name'=>'confirm', 'class'=>'btn btn-primary btn-block btn-flat','id' => 'submit')) !!}
             </div><!-- /.col -->
           </div>
         {{--<div class="social-auth-links text-center">--}}
           {{--<p>- OR -</p>--}}
           {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>--}}
           {{--<a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>--}}
         {{--</div><!-- /.social-auth-links -->--}}

         <a href="{{ route('get.auth.auth.login') }}">Quay lại trang đăng nhập</a>

       </div><!-- /.login-box-body -->
     </div><!-- /.login-box -->

     <!-- jQuery 2.1.4 -->
     <script src="{{ url('public/auth/js/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
     <!-- Bootstrap 3.3.2 JS -->
     <script src="{{ url('public/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
     <!-- iCheck -->
     <script src="{{ url('public/auth/js/icheck.min.js') }}" type="text/javascript"></script>
     <script>
       $(function () {
         $('input').iCheck({
           checkboxClass: 'icheckbox_square-blue',
           radioClass: 'iradio_square-blue',
           increaseArea: '20%' // optional
         });
       });
     </script>
     @section('bonusJs')
     @show
   </body>
 </html>
