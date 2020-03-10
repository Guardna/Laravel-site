<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\CommentsModel;
use App\Models\Meni;
use App\Models\Post;
use App\Models\Korisnik;
use DB;
/**
 * Description of FrontendController
 *
 * @author korisnik
 */
class FrontendController extends Controller {
    //put your code here
    private $data = [];
 
    public function __construct(){
    	$meni = new Meni();
    	$this->data['menus'] = $meni->getAll();
    }
    public function index(){
    	$post = new Post();
        $this->data['posts'] =$post->getAll();
        
        $users = DB::table('post')->select('*','post.id as postId','post.created_at as create','post.updated_at as update')->join('slika as s','post.slika_id','=','s.id')->join('korisnik as k','post.korisnik_id','=','k.id')->join('uloga as u','k.uloga_id','=','u.id')->orderBy('post.created_at','desc');
        $this->data['users'] =$users->simplePaginate(5);
     
        return view('pages.home', $this->data);
    }
    public function autor(){
        $korisnik = new Korisnik();
        $this->data['korisnici'] = $korisnik->getAll();
        return view('pages.autor', $this->data);
    }
     public function galerija(){
        $post = new Post();
        $this->data['posts'] =$post->getAll();
        return view('pages.galerija', $this->data);
    }
    public function getPost($id){
        $post = new Post();
        // var_dump($post->get($id));
        $this->data['singlePost'] = $post->get($id);
        
        $commentModel = new CommentsModel();
        $this->data['comments'] = $commentModel->getPostComments($id);

        return view('pages.post', $this->data);
    }
    public function download(){
        $headers = array(
          'Content-Type: application/pdf',
        );
        return response()->download(('dokumentacija.pdf'), 'dokumentacija.pdf', $headers);
    }
 
}
