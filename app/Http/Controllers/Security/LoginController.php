<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{   
   
    use AuthenticatesUsers;

    protected $redirectTo = "/workspace"; 

   
    public function login(Request $request)
    {   



        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse_edit($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("security.login");
    }

   // protected function credentials(Request $request)
   //  {
   //      $login = $request->input($this->username());

   //    $field = ;

   //      return [
   //      $field => $login,
   //      'password' => $request->input('password')
   //      ];
   //  }

      protected function authenticated(Request $request, $user)
    {   
        $type_user = $user->type_user()->get();

        $user->set_session($type_user->toArray());
    }

    public function username()
    {
        return 'DNI';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
                    

        throw ValidationException::withMessages([
            
            'Cedula o contraseña no encontrada'

         
        ])->redirectTo('/login');


    }

}
