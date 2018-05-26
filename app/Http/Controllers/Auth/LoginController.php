<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use Session;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function login(Request $request)
    {
      $this->validateLogin($request);

      if ($this->attemptLogin($request)) {

          $user = $this->guard()->user();
          $user->generateToken();

          return $user;
      }

      return response()->json(['data' => 'Error en al loguear, Usuario o Contraseña incorrectos'], 200);
    }



    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }

    public function showLogin()
    {
      return view('login');
    }

    public function log(Request $request)
    {
      $this->validateLogin($request);

      if ($this->attemptLogin($request)) {
          $user = $this->guard()->user();
          Session::put('api_token',$user->generateToken());
          Session::put('userid',$user->id);
          Session::put('username',$user->name);
          return view('admin.formUser')->with('api_token',Session::get('api_token'));
      }

      return view('login');
    }
}
