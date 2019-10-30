<?php

namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   // use AuthenticatesUsers, LoginRequest;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/file';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin(){
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
    public function postLogin(Request $request){

		//$this ->validate($request, [
			//'email' => 'required|email',
			//'password' => 'required'
		//]);

		$credentials = array(
	    	'email' => $request->get('email'),
			'password' => $request->get('password')
		);

        //$login = $request->only('email', 'password');
        $email = $request['email'];
        $password = $request['password'];
        //echo $request['email']."<br>";
       // echo $request['password'];

       // $user = User::find(2);
        //
        //return view('successLogin',['User'=>Auth::User()]);

        if(Auth::attempt($credentials)){
         //   echo $request['email']."<br>";
        //   echo $request['password'];
            return Redirect::route('upload.file');
    }else{
			return back()->with('error','Wrong login details or user is not registered.');
       // echo $this->auth->user()->username;
       // return view('auth.Login',['error'=>'Login Fail']);
        // return redirect('uploading');
	};



     //  if($this->auth->attempt($login)){
	//	if(Auth::attempt($login)){
			//echo $this->auth->user()->username;
		//	return redirect()->route("upload.file");
        //}else{

          //  return redirect()->back();
       // };
    }
}

