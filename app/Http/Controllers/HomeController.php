<?php namespace App\Http\Controllers;
use Auth;
use Redirect;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->beforeFilter(function()
		{
			$this->middleware('auth');
			if(Auth::user()->roll == 'admin'){
				return Redirect::to('data');
			}
			elseif (Auth::user()->roll == 'pharma') {
				return Redirect::to('pharmaData')
					->with(Auth::user()->id);
			}
			elseif (Auth::user()->roll == 'lab') {
				return Redirect::to('userData')
					->with(Auth::user()->id);
			}
			elseif (Auth::user()->roll == 'Canceled') {
				return view('failed');
			}
			else {
				return view('authprocess');
			}
		});
			
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

}
