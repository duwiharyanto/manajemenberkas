<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
class frontend extends Controller
{
    private $url='Cariberkas';
    private $tabel='berkas';
    private $path_view='berkas/';
    private $headline="menu berkas";
    private $subheadline="data berkas";

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
            'namaberkas'=>'required',
            'keterangan'=>'required',
            'namafile'=>'required',
            'file'=>'required|mimes:pdf|max:100000',
        ],$message);        
    }	
    public function cariberkas(){
    	$result=DB::table($this->tabel)->limit(1)->get();
    	$data=[
    		'conf'=>$this->config(),
    		'data'=>$result,
    	];
    	return view('frontend.cariberkas',$data);
    }
    public function store(Request $request){
    	//$keyword='%'.$request->namaberkas.'%';
    	//dd($keyword);
    	$result=DB::table($this->tabel)->where('namaberkas', 'like','%'.$request->namaberkas.'%' )->get();
    	$data=[
    		'conf'=>$this->config(),
    		'data'=>$result,
    	];
    	return view('frontend.cariberkas',$data);
    }    
}
