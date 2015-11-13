<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Input;
use Auth;
use Hash;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

 	protected $redirectPath = '/parts';

 	protected $loginPath = '/auth/login';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => 'required|max:45',
            'first_name' => 'required|max:45',
            'email' => 'required|email|max:70|unique:users',
            'password' => 'required|confirmed|min:7',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

	// public function getSignIn()
	// {
	// 	return view('account.sign-in');
	// }


	// public function postSignIn()
	// {
	// 	// if (Auth::check())
	// 	// 	return redirect('parts-category');

	// 	$validator = Validator::make(
	// 		Input::all(), 
	// 		array(
	// 			'email' => 'required|email',
	// 			'password' => 'required'
	// 		)
	// 	);	
		
	// 	if($validator->fails()) 
	// 	{
	// 		return redirect()->back();
	// 				// ->withErrors($validator)
	// 				// ->withInput();
	// 	} else {
	// 		$remember = (Input::has('remember')) ? true : false;


	// 		$auth = Auth::attempt(array(
	// 				'email' => Input::get('email'),
	// 				'password' => Input::get('password'),
	// 				'status' => 1
	// 		), $remember);


	// 		if($auth) {
	// 			return redirect('parts');;
	// 		} else {
	// 			return redirect()->back();
	// 						// ->with('global', 'Epasts/parole ir nepareizi, vai arī konts nav aktivizēts!');
	// 		}
	// 	}

	// 	return redirect()->back();

	// }


	// public function getSignOut()
	// {
	// 	Auth::logout();
	// 	return redirect('account-sign-in');		
	// }


	// public function getCreate()
	// {
	// 	return view('account.create');
	// }


	// public function postCreate()
	// {
	// 	$validator = Validator::make(
	// 		Input::all(),
	// 		array(
	// 			'email' 			=> 'required|max:70|email|unique:users',
	// 			'password' 			=> 'required|min:7',
	// 			'password_again'	=> 'required|same:password'
	// 		)
	// 	);	


	// 	if($validator->fails()) 
	// 	{
	// 		return Redirect::route('account.create')
	// 					-> withErrors($validator)
	// 					-> withInput();
	// 	} else {
	// 		$email 		= Input::get('email');
	// 		$password 	= Input::get('password');

	// 		// Aktivācijas kods
	// 		//$code		= str_random(60);

	// 		$user = User::create(array(
	// 			'email' => $email,
	// 			'password' => Hash::make($password), 
	// 			//'code' => $code, 
	// 			'status' => 1,
	// 			'position' => 0
	// 		));


	// 		if($user) 
	// 		{
	// 			// Mail::send(
	// 			// 		'emails.auth.activate', 
	// 			// 		array(
	// 			// 				'link' => URL::route('account-activate', $code), 
	// 			// 				'username' => $username), 
	// 			// 		function($message) use ($user)
	// 			// 		{
	// 			// 			$message
	// 			// 				->to($user->email, $user->username)
	// 			// 				->subject('Jūsu konta aktivizēšana.');
	// 			// 		}
	// 			// );



	// 			// return view('account.sign-in');
	// 		}
	// 	}


	// }
}
