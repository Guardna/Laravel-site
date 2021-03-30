<?php

namespace App\Http\Controllers;
use App\Models\Meni;
use App\Models\Uloga;
use App\Models\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KorisnikController extends Controller {

	private $data = [];

	public function __construct() {
		$uloga = new Uloga();
		$this->data['uloge'] = $uloga->getAll();
                $meni = new Meni();
                $this->data['menus'] = $meni->getAll();
	}

	public function show($id = null){
		$korisnik = new Korisnik();
		$this->data['korisnici'] = $korisnik->getAll();

		if(!empty($id)){
			$korisnik->id = $id;
			$this->data['korisnik'] = $korisnik->get();
		}

		return view('pages.createKorisnik', $this->data);
	}
        public function regshow($id = null){
		$korisnik = new Korisnik();
		$this->data['korisnici'] = $korisnik->getAll();

		if(!empty($id)){
			$korisnik->id = $id;
			$this->data['korisnik'] = $korisnik->get();
		}

		return view('pages.register', $this->data);
	}

	public function store(Request $request){

                $rules=[
			'korisnickoIme' => 'required','unique:korisnik,korisnicko_ime','min:4',
                        'ddlUloga' => 'required','not_in:0',
                        'lozinka' => [
                            'required',
                            'min:6',
                            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'],
			'slika' => 'required','mimes:jpg,jpeg,png,gif'
		];
                
                $messages = [
                "lozinka.regex" => 'Password must contain one uppercase letter and one number.'];
                
                $validator = \Validator::make($request->all(), $rules, $messages);
                $validator->validate();
                
                
		$korisnicko_ime = $request->get('korisnickoIme');
		$lozinka = $request->get('lozinka');
		$uloga_id = $request->get('ddlUloga');
		
		$slika = $request->file('slika');
               
		$tmp_putanja = $slika->getPathName(); 
		$ekstenzija = $slika->getClientOriginalExtension(); 
		$ime_fajla = time().'.'.$ekstenzija;
		$putanja = 'images/'.$ime_fajla;
		
		$putanja_server = ($putanja);

		try {
			File::move($tmp_putanja, $putanja_server);


			$korisnik = new Korisnik();
			$korisnik->korisnicko_ime = $korisnicko_ime;
			$korisnik->lozinka = $lozinka;
			$korisnik->slika = $putanja;
			$korisnik->uloga_id = $uloga_id;

			$rez = $korisnik->save();
			if($rez == 1){
				return redirect('/users')->with('message','Uspesan unos!');
			}
			else {
				return redirect('/users')->with('message','Greska pri unosu!');
			}
		}
		catch (\Exception $ex){
			\Log::error('MOJA GRESKA: '.$ex->getMessage());
		}
	}
        public function regstore(Request $request){

		$rules=[
			'korisnickoIme' => ['required','unique:korisnik,korisnicko_ime','min:4'],
                        'lozinka' => [
                            'required',
                            'min:6',
                            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'],
			'slika' => 'required','mimes:jpg,jpeg,png,gif'
		];
                
                $messages = [
                "lozinka.regex" => 'Password must contain one uppercase letter and one number.'];
                
                $validator = \Validator::make($request->all(), $rules, $messages);
                $validator->validate();
                
		$korisnicko_ime = $request->get('korisnickoIme');
		$lozinka = $request->get('lozinka');
		$uloga_id = "2";
		
		$slika = $request->file('slika');
               
		$tmp_putanja = $slika->getPathName();
		$ekstenzija = $slika->getClientOriginalExtension(); 
		$ime_fajla = time().'.'.$ekstenzija;
		$putanja = 'images/'.$ime_fajla;
		
		$putanja_server = ($putanja);
		try {
			File::move($tmp_putanja, $putanja_server);


			$korisnik = new Korisnik();
			$korisnik->korisnicko_ime = $korisnicko_ime;
			$korisnik->lozinka = $lozinka;
			$korisnik->slika = $putanja;
			$korisnik->uloga_id = $uloga_id;

			$rez = $korisnik->save();
		
			if($rez == 1){
				return redirect('/register')->with('message','Uspesan unos!');
			}
			else {
				return redirect('/register')->with('message','Greska pri unosu!');
			}
		}
		catch (\Exception $ex){
			\Log::error('MOJA GRESKA: '.$ex->getMessage());
		}
	}

	public function update($id, Request $request) {
		$korisnicko_ime = $request->get('korisnickoIme');
		$lozinka = $request->get('lozinka');
		$uloga_id = $request->get('ddlUloga');
		
		$slika = $request->file('slika');

		$korisnik = new Korisnik();
		$korisnik->id = $id;
		$korisnik->korisnicko_ime = $korisnicko_ime;
		$korisnik->lozinka = $lozinka;
		$korisnik->uloga_id = $uloga_id;

		if(!empty($slika)){ 
			
		
			$korisnik_to_update = $korisnik->get();
			File::delete($korisnik_to_update->slika);

		
			$tmp_putanja = $slika->getPathName();
			$ime_fajla = time().'.'.$slika->getClientOriginalExtension();
			$putanja = 'images/'.$ime_fajla;
			$putanja_server = ($putanja);

			File::move($tmp_putanja, $putanja_server);

			$korisnik->slika = $putanja;
		}

		$rez = $korisnik->update();
		
		if($rez == 1){ 
			return redirect('/users')->with('message','Uspesan update!');
		}
		else {
			return redirect('/users')->with('message','Greska pri update-u!');
		}
	}

	public function destroy($id){
		$korisnik = new Korisnik();
		$korisnik->id = $id;

		$korisnik_to_update = $korisnik->get();
		File::delete($korisnik_to_update->slika);

		$rez = $korisnik->delete();
		if($rez == 1){
			return redirect('/users')->with('message','Uspesan delete!');
		}
		else {
			return redirect('/users')->with('message','Greska pri delete-u!');
		}
	}
}