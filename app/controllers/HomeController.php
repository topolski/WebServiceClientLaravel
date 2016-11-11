<?php

class HomeController extends BaseController {

	public function __construct() 
	{
         parent::__construct();
    }

    public function index()
    {
    	return View::make('hello');
    }

	public function login()
	{
		if(Request::isMethod('GET')){
			if(!Session::get('auth'))
			{
				return View::make('login');
			}else
			{
				return Redirect::to('/');
			}
		}elseif(Request::isMethod('POST')){
			$response = $this->client->post("login", array(), array('email' => Input::get('email'), 'password' => Input::get('password')))->send();
			$podaci = $response->json();
			if(!$podaci['error']){
				Session::put('auth', true);
				Session::put('token', $podaci['token']);
				Session::put('meni', $podaci['meni']);
				return Redirect::to('/')->with('message', $podaci['nazivAkcije']);
			}else
			{
				return Redirect::back()->with('error', 'Podaci za autentifikaciju nisu tačni. Pokušajte ponovo.');
			}
		}
	}

	public function logout()
	{
		$response = $this->client->get("logout", array('X-Auth-Token' => Session::get('token')))->send();
		$podaci = $response->json();
		if(!$podaci['error']){
			Session::put('auth', false);
			Session::put('token', '');
			return Redirect::to('/login')->with('message', $podaci['nazivAkcije']);
		}else{
			return Redirect::to('/login')->with('message', $podaci['nazivAkcije']);
		}
	}
}
