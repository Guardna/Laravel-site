<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Uloga {

	private $table = 'uloga';
	public $id;
	public $naziv;

	public function getAll(){
		$rezultat = DB::table($this->table)->get();
		return $rezultat;
	}

	public function get(){
		return DB::table($this->table)
				->select('*')
				->where('id',$this->id)
				->first();
	}

	public function save(){
		return DB::table($this->table)
			->insert([
				'naziv' => $this->naziv
			]);
	}

	public function update(){
		return DB::table($this->table)
			->where('id', $this->id)
			->update([
				'naziv' => $this->naziv
			]);
	}

	public function delete(){
		return DB::table($this->table)
			->where('id', $this->id)
			->delete()
		;
	}


}
