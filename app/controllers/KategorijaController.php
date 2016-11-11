<?php

class KategorijaController extends \BaseController {

	public function __construct() {
         parent::__construct();
    }

	public function adminK()
	{
		$response = $this->client->get("kategorije", $this->token)->send();
		$podaci = $response->json();
		return View::make('admin.adminK')
			->with('kategorije', $podaci['kategorije'])
			->with('d', false)
			->with('greska', $podaci['error']);
	}

	public function adminKdetails($id)
	{
		$response = $this->client->get("kategorije/$id", $this->token)->send();
		$podaci = $response->json();
		return View::make('admin.adminK')
			->with('kategorije', $podaci['kategorije'])
			->with('d', true)
			->with('greska', $podaci['error'])
			->with('naslov', $podaci['nazivAkcije']);
	}

	public function adminKdelete($id){
		$response = $this->client->delete("kategorije/$id", $this->token)->send();
		$podaci = $response->json();
		$poruka = 'message';
		if($podaci['error'])
		{
			$poruka = 'error';
		}
		return Redirect::to("/kategorije")->with($poruka, $podaci['nazivAkcije']);
	}

	public function adminKedit($id){
		if(Request::isMethod('GET')){
			$response = $this->client->get("kategorije/$id/edit", $this->token)->send();
			$podaci = $response->json();
			if($podaci['error']){
				return View::make('admin.adminKforma')
				->with('greska', $podaci['error']);
			}else{
				$schema = json_encode($podaci['schema']);
				$form = json_encode($podaci['form']);
				return View::make('admin.adminKforma')
				->with('schema', $schema)
				->with('form', $form)
				->with('naslov', true)
				->with('greska', $podaci['error']);
			}
			
		}elseif(Request::isMethod('POST')){
			$response = $this->client->put("kategorije/$id", $this->token, array('nazivKategorije' => Input::get('naziv')))->send();
			$podaci = $response->json();
			$poruka = "message";
			if($podaci['error'])
			{
				$poruka = 'error';
			}
			return Redirect::to("/kategorije")->with($poruka, $podaci['nazivAkcije']);
		}
	}

	public function adminKnew(){
		if(Request::isMethod('GET')){
			$response = $this->client->get("kategorije/create", $this->token)->send();
			$podaci = $response->json();
			$schema = json_encode($podaci['schema']);
			$form = json_encode($podaci['form']);
			return View::make('admin.adminKforma')->with('schema', $schema)->with('form', $form)->with('greska', $podaci['error']);
		}elseif(Request::isMethod('POST')){
			$response = $this->client->post("kategorije", $this->token, array('nazivKategorije' => Input::get('naziv')))->send();
			$podaci = $response->json();
			$poruka = "message";
			if($podaci['error'])
			{
				$poruka = 'error';
			}
			return Redirect::to("/kategorije")->with($poruka, $podaci['nazivAkcije']);
		}
	}

}