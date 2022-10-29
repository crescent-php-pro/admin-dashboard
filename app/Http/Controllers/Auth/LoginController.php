<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers {
      logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
      $this->performLogout($request);
      return redirect()->route('login')->with('status','Logged Out Successfully!');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
            // try {
              // \DB::connection()->getPDO();
              if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
              {
                  if (auth()->user()->is_admin == 1) {
                      return redirect()->route('Dashboard | Admin')->with('status','Welcome '.auth()->user()->firstname);
                  }
                  elseif (auth()->user()->is_admin == 0)
                  {
                      return redirect()->route('Dashboard | Home')->with('status','Welcome '.auth()->user()->firstname);
                  }
              }
              else
              {
                  return redirect()->route('login')->withInput()
                      ->with('invalid','Invalid Email Address or Password');
              }
            // } catch (\Exception $e) {
            //   return redirect()->back()->with('error' , 'Oops! No Failed to Connect!');
            // }


    }
}
