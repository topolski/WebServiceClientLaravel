<?php

class SefController extends \BaseController {

	public function __construct() {
         parent::__construct();
    }

	public function adminS()
	{
		$response = $this->client->get("sefovi", $this->token)->send();
		$podaci = $response->json();
		return View::make('admin.adminS')
			->with('sefovi', $podaci['sefovi'])
			->with('d', false)
			->with('naslov', $podaci['nazivAkcije'])
			->with('greska', $podaci['error']);
	}

	public function adminSdetails($id)
	{
		$response = $this->client->get("sefovi/$id", $this->token)->send();
		$podaci = $response->json();
		return View::make('admin.adminS')
			->with('sef', $podaci['sefovi'])
			->with('d', true)
			->with('naslov', $podaci['nazivAkcije'])
			->with('greska', $podaci['error']);
	}

	public function adminSdelete($id)
	{
		$response = $this->client->delete("sefovi/$id", $this->token)->send();
		$podaci = $response->json();
		$poruka = 'message';
		if($podaci['error'])
		{
			$poruka = 'error';
		}
		return Redirect::to("/sefovi")->with($poruka, $podaci['nazivAkcije']);
	}

	public function adminSnew(){
		
		if(Request::isMethod('GET')){
			$response = $this->client->get("sefovi/create", $this->token)->send();
			$podaci = $response->json();
			$schema = json_encode($podaci['schema']);
			$form = json_encode($podaci['form']);
			return View::make('admin.adminSforma')->with('schema', $schema)->with('form', $form);
		
		}elseif(Request::isMethod('POST')){
			$naziv = Input::get('naziv');
			$opis = Input::get('opis');
			$cena = Input::get('cena');
			$idKategorija = Input::get('idKategorija');
			$boja = Input::get('boja');
			$brava = Input::get('brava');
			$ubrava = Input::get('ubrava');
			$zabravljivanje = Input::get('zabravljivanje');
			$tip = Input::get('tip');
			$sv = Input::get('sv');
			$ss = Input::get('ss');
			$sd = Input::get('sd');
			$uv = Input::get('uv');
			$us = Input::get('us');
			$ud = Input::get('ud');
			$police = Input::get('police');
			$tezina = Input::get('tezina');
			$zapremina = Input::get('zapremina');
			
        	$slikaMimeTip = null;
        	$base64 = null;
        	$slika = Input::file('slika');
        	if($slika){
        		$img_data = file_get_contents($slika);
				$slikaMimeTip = $slika->getMimeType();
				$base64 = base64_encode($img_data);
			}

			$a = array(
				'naziv' => $naziv, 
				'opis' => $opis, 
				'mimeType' => $slikaMimeTip, 
				'slika' => $base64, 
				'cena' => $cena, 
				'idKategorija' => $idKategorija, 
				'boja' => $boja, 
				'brava' => $brava, 
				'ubrava' => $ubrava, 
				'zabravljivanje' => $zabravljivanje, 
				'tip' => $tip, 
				'sv' => $sv, 
				'ss' => $ss, 
				'sd' => $sd, 
				'uv' => $uv, 
				'us' => $us, 
				'ud' => $ud, 
				'police' => $police, 
				'tezina' => $tezina, 
				'zapremina' => $zapremina );
			

			$response = $this->client->post("sefovi", $this->token, $a)->send();
			$podaci = $response->json();
			$poruka = "message";
			if($podaci['error'])
			{
				$poruka = 'error';
			}
			return Redirect::to("/sefovi")->with($poruka, $podaci['nazivAkcije']);
			
		}
	}

	public function adminSedit($id){
		if(Request::isMethod('GET')){
			$response = $this->client->get("sefovi/$id/edit", $this->token)->send();
			$podaci = $response->json();
			if($podaci['error']){
				return View::make('admin.adminSforma')
					->with('greska', $podaci['nazivAkcije']);
			}else{
				$schema = json_encode($podaci['schema'], true);
				$form = json_encode($podaci['form'], true);
				return View::make('admin.adminSforma')
					->with('schema', $schema)
					->with('form', $form)
					->with('naslov', $podaci['nazivAkcije']);	
			}
				
		}elseif(Request::isMethod('POST')){		
			$naziv = Input::get('naziv');
			$opis = Input::get('opis');
			$cena = Input::get('cena');
			$idKategorija = Input::get('idKategorija');
			$boja = Input::get('boja');
			$brava = Input::get('brava');
			$ubrava = Input::get('ubrava');
			$zabravljivanje = Input::get('zabravljivanje');
			$tip = Input::get('tip');
			$sv = Input::get('sv');
			$ss = Input::get('ss');
			$sd = Input::get('sd');
			$uv = Input::get('uv');
			$us = Input::get('us');
			$ud = Input::get('ud');
			$police = Input::get('police');
			$tezina = Input::get('tezina');
			$zapremina = Input::get('zapremina');

			$pf = null;
			$slika = Input::file('slika');
			$base64 = null;
			$slikaMimeTip = null;
			if(isset($slika)){
				$img_data = file_get_contents($slika);
				$slikaMimeTip = $slika->getMimeType();
				$base64 = base64_encode($img_data);
			}
        	$pf = array(
	        	'naziv' => $naziv,
	        	'opis' => $opis, 
	        	'mimeType' => $slikaMimeTip,
	        	'slika' => $base64, 
	        	'cena' => $cena, 
	        	'idKategorija' => $idKategorija, 
	        	'boja' => $boja, 
	        	'brava' => $brava, 
	        	'ubrava' => $ubrava, 
	        	'zabravljivanje' => $zabravljivanje, 
	        	'tip' => $tip, 
	        	'sv' => $sv, 
	        	'ss' => $ss, 
	        	'sd' => $sd, 
	        	'uv' => $uv, 
	        	'us' => $us, 
	        	'ud' => $ud, 
	        	'police' => $police, 
	        	'tezina' => $tezina, 
	        	'zapremina' => $zapremina);
        		
			$response = $this->client->put("sefovi/$id", $this->token, $pf)->send();
			$podaci = $response->json();
			$poruka = "message";
			if($podaci['error'])
			{
				$poruka = 'error';
			}
			return Redirect::to("/sefovi")->with($poruka, $podaci['nazivAkcije']);
		}
	}

}