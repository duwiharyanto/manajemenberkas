<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Crypt;
use DB;
use Hash;
use Session;
class login extends Controller
{
    private $url='Login';
    private $tabel='users';
    private $path_view='login/';
    private $headline="login form";
    private $subheadline="login user";

    private function config(){
        $conf=[
            'url'=>$this->url,
            'headline'=>$this->headline,
            'subheadline'=>$this->subheadline,
        ];
        return (object)$conf;
    }
    public function validasi($request){
        $message=[
            'required'=>":attribute Wajib diisi",
            'mime'=>":attribute File PDF",
        ];
        $this->validate($request,[
            // 'user_id'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],$message);        
    }
    public function index()
    {
        $data=[
            'conf'=>$this->config(),
        ];
        return view('login.index',$data);
    }
    public function auth(Request $req){
    	$this->validasi($req);
    	$result=DB::table($this->tabel)->where('email',$req->email)->first();
    	if($result){
    		if($result->password==$req->password){
    			Session::put('name',$result->name);
    			Session::put('email',$result->email);
    			Session::put('login',TRUE);
    			return redirect()->route('Berkas.index')->with('alertsuccess','Login berhasil');
    		}else{
    			return redirect($this->url)->with('alerterror','Password salah');
    		}
    	}else{
    		return redirect($this->url)->with('alerterror','Username tida terdaftar');
    	}
    }
    public function logout(){
    	Session::flush();
    	return redirect($this->url)->with('alertsuccess','Kamu sudah logout');

    }    
}
