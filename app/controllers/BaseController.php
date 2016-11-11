<?php

use Guzzle\Service\Client;

class BaseController extends Controller {

	protected $client;
	protected $token;

  	public function __construct()
  	{
    	$this->client = new Client('http://rwstope.esy.es/api/');
    	$this->token = array('X-Auth-Token' => Session::get('token'));
  	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
