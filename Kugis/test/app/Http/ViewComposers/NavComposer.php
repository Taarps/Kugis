<?php 
namespace App\Http\ViewComposers;

// use Illuminate\Contracts\View\View;
// use Illuminate\Users\Repository as UserRepository;
use Auth;

class NavComposer 
{
	public function compose($view)
	{
		if((strlen(Auth::user()->last_name) == 0) 
				|| (strlen(Auth::user()->first_name) == 0))
			$user_name = Auth::user()->email;
		else
			$user_name = Auth::user()->last_name . ' ' . Auth::user()->first_name;


		$view->with('name', $user_name);
	}
}