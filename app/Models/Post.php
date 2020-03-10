<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;


class Post {
	public $id;
	public $naslov;
	public $sadrzaj;
	public $korisnik_id;
	public $slika_id;
        private $table = 'post';

	public function getAll(){
		$rezultat = DB::table('post')
					->select('*','post.id as postId','post.created_at as create','post.updated_at as update')
					->join('slika as s','post.slika_id','=','s.id')
					->join('korisnik as k','post.korisnik_id','=','k.id')
                                        ->join('uloga as u','k.uloga_id','=','u.id')
					->orderBy('post.created_at','desc')
					->get();
		return $rezultat;
	}
     

	public function save() {
		$rezultat = DB::table('post')->insert([
			'naslov' => $this->naslov,
			'sadrzaj' => $this->sadrzaj,
			'korisnik_id' => $this->korisnik_id,
			'created_at' => time(),
			'slika_id' => $this->slika_id
		]);
		return $rezultat;
	}
      
    
    public function get($id){
        $rezultat = 
                DB::table($this->table)
                ->select('*', 
                        'post.id AS postId',
                        'post.created_at as create',
                        'post.updated_at as update',
                        'korisnik.korisnicko_ime as postKorisnik',
                        'k.korisnicko_ime as komentarKorisnik',
                        'comments.post_id as comments')
                ->join('slika','slika.id','=','post.slika_id')
                // Komentari se mogu dohvatati i posebnim upitom
                ->join('korisnik','korisnik.id','=','post.korisnik_id')
                ->leftJoin('comments','comments.post_id','=','post.id')
                ->leftJoin('korisnik AS k','k.id','=','comments.user_id')
                ->where('post.id','=',$id )
                ->first();
        return $rezultat;
    }
    public function update(){
		$data = [
			'naslov' => $this->naslov,
			'sadrzaj' => $this->sadrzaj,
			'alt' => $this->alt,
                        'updated_at' => time(),
		];
		
                if ($this->slika_id != null) {
                $data['slika_id'] = $this->slika_id;
                }

		$rez = DB::table('post')
		->where('id',$this->id)
				->update($data)
				;
		return $rez;
                
	}
        

	public function delete(){
		$rezultat = DB::table('post')
					->where('id', $this->id)
					->delete();
		return $rezultat;
	}
        public function deleted(){
		$rezultat = DB::table('slika')
					->where('id', $this->slika_id)
					->delete();
		return $rezultat;
	}
        public function getPictureId($postId)
    {
        return \DB::table($this->table)
            ->where('slika_id', $postId->slika_id)
            ->select("slika.id as id")
            ->get()->first()->id;
    }

}