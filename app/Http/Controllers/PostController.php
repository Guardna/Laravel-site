<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\CommentsModel;
use App\Models\Meni;
use App\Models\Post;
use App\Models\Slika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class PostController extends Controller {

	private $data = [];
      
    public function __construct(){
    	$meni = new Meni();
    	$this->data['menus'] = $meni->getAll();
    }

	public function create(){

		return view('pages.createPost', $this->data);
	}

	public function store(Request $request) {


		$rules = [
			'title' => 'regex:/^[A-Z][a-z]+(\s[\w\d\-]+)*$/',
			'body' => 'required',
			'photo' => 'required|mimes:jpg,jpeg,png,gif|max:3000',
			'alt' => 'required'
		];
		$custom_messages = [
			'required' => 'Polje :attribute je obavezno!',
			'title.regex' => 'Polje title treba da pocne velikim slovom!',
			'max' => 'Fajl ne sme biti veci od :max KB.',
			'mimes' => 'Dozvoljeni formati su: :values.'
		];
		$request->validate($rules, $custom_messages);
		

		$photo = $request->file('photo');
		$extension = $photo->getClientOriginalExtension();
		$tmp_path = $photo->getPathName();
		
		$folder = 'images/';
		$file_name = time().".".$extension;
		$new_path = ($folder).$file_name;

		try {
		

			File::move($tmp_path, $new_path);

	

			$slika = new Slika();
			$slika->alt = trim($request->get('alt'));
			$slika->putanja = 'images/'.$file_name;
			$slika_id = $slika->save();

	
			$post = new Post();
			$post->naslov = $request->get('title');
			$post->sadrzaj = $request->get('body');
            $post->korisnik_id = session()->get('user')[0]->id;
			$post->slika_id = $slika_id;
			$post->save();

			return redirect('/')->with('success','Uspesno ste dodali post i sliku!');
		}
		catch(\Illuminate\Database\QueryException $ex){ 
			\Log::error($ex->getMessage());
			return redirect()->back()->with('error','Greska pri dodavanju posta u bazu!');
		}
		catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $ex) { 
			\Log::error('Problem sa fajlom!! '.$ex->getMessage());
			return redirect()->back()->with('error','Greska pri dodavanju slike!');
		}
		catch(\ErrorException $ex) { 
			\Log::error('Problem sa fajlom!! '.$ex->getMessage());
			return redirect()->back()->with('error','Desila se greska..');
		}
	}
        public function postshow($id = null){
		$post = new Post();
		$this->data['postovi'] = $post->getAll();

		if(!empty($id)){
			$post->id = $id;
			$this->data['post'] = $post->get($id);
		}

		return view('pages.createPost', $this->data);
	}
        
        public function update(Request $request,$id) {
                $rules = [
			'title' => 'regex:/^[A-Z][a-z]+(\s[\w\d\-]+)*$/',
			'body' => 'required',
			'photo' => 'mimes:jpg,jpeg,png,gif|max:3000',
			'alt' => 'required'
		];
		$custom_messages = [
			'required' => 'Polje :attribute je obavezno!',
			'title.regex' => 'Polje title nije u ispravnom formatu!',
			'max' => 'Fajl ne sme biti veci od :max KB.',
			'mimes' => 'Dozvoljeni formati su: :values.'
		];
		$request->validate($rules, $custom_messages);

		
            $oldPictureId = null;
			
			$photo = $request->file('photo');
            $post = new post();
            $post->id = $id;
            $post->naslov = $request->get('title');
            $post->sadrzaj = $request->get('body');
			$post->slika_id=$post->get($id)->slika_id;
			
			$oldPictureId = $post->getPictureId($id);
		
			if (!empty($photo)){ 

							try{	

								$rezz=$post->deleted();			
								$folder = ('images/');
								$extension = $photo->getClientOriginalExtension();
								$file_name = time().".".$extension;
								$photo->move($folder, $file_name);
								
								$slika = new Slika();
								$slika->putanja = 'images/' . $file_name;
								$slika->alt = trim($request->get('alt'));
								$slika_id = $slika->save();
								$post->slika_id = $slika_id;
	
								
							}catch (QueryException $e) {
					\Log::error("Greska pri update-u objave: " . $e->getMessage());
				} catch (FileException $e) {
					\Log::error("Greska pri update-u objave u dodavanju slike: " . $e->getMessage());
				}
			   }
                $rez=$post->update();

				if($rez == 1){
				return redirect('/posts')->with("success", "Post successfully edited!");
			}else {
				return redirect('/posts')->with('message','Greska pri update-u!');
			}

  
            }
        
                
		
		
       
        public function destroy($id){
		$post = new Post();
		$post->id = $id;
            
                $post->slika_id=$post->get($id)->slika_id;

                $rezz=$post->deleted();
                
                
		$rez = $post->delete();
		if($rez == 1 && $rezz==1){
			return redirect('/posts')->with('message','Uspesan delete!');
		}
		else {
			return redirect('/posts')->with('message','Greska pri delete-u!');
		}
	}
}