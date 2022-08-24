<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('products');
        }
        return Redirect::to("auth.login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        //'contact_number' => 'required|contact_number|unique:users',
        'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return Redirect::to("products")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {

      if(Auth::check()){
        return view('products');
      }
       return Redirect::to("auth/login")->withSuccess('Opps! You do not have access');
    }

	public function create(array $data)
	{
	  return User::create([
	    'name' => $data['name'],
	    'email' => $data['email'],
	    'password' => Hash::make($data['password'])
	  ]);
	}

	public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('auth/login');
    }
}
