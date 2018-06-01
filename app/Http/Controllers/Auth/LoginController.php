<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use Session;
use App\TipoUsuario;

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
    protected $redirectTo = '/calendario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function logoutapi(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }

    public function loginapi(Request $request)
    {
      $this->validateLogin($request);

      if ($this->attemptLogin($request)) {

          $user = $this->guard()->user();
          $user->generateToken();

          return $user;
      }

      return response()->json(['data' => 'Error en al loguear, Usuario o Contraseña incorrectos'], 200);
    }
}
