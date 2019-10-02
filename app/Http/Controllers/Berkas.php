<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
class Berkas extends Controller
{

    private $url='Berkas';
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
            'file'=>'required|mimes:pdf|max:500000',
        ],$message);        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=DB::table($this->tabel)->get();
        $data=[
            'conf'=>$this->config(),
            'data'=>$result,
        ];
        return view('berkas.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result=DB::table('users')->get();
        $data=[
            'conf'=>$this->config(),
            'data'=>$result,
        ];
        return view('berkas.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $message=[
        //     'required'=>":attribute Wajib diisi",
        //     'mimes'=>'format pdf'
        // ];
        // $this->validate($request,[
        //     'nama'=>'required',
        //     'fileupload'=>'required|max:10000|mimes:pdf',
        // ],$message);
        $this->validasi($request);
        if($request->hasFile('file')){
            $path=$request->file('file')->store("/public/berkas");
            $namafile=explode('/', $path);
            // dd(last($namafile));
            $data=[
                'namaberkas'=>$request->namaberkas,
                'keterangan'=>$request->keterangan,
                'namafile'=>$request->namafile,
                'file'=>$path,
            ];
            $save = DB::table($this->tabel)->insert($data);
            return redirect($this->url)->with('alertsuccess','Simpan berhasil');
        }else{
           return redirect()->route('Berkas.create')->with('alerterror','Simpan error');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $result = DB::table($this->tabel)->where('id',$id)->first();
        if($request->hapus){
            if(Storage::delete($result->file)){
                DB::table($this->tabel)->where('id',$id)->delete();
            };
            //dd('hapus');            
        }else{
            dd('download');
        }
        return redirect($this->url)->with('alertsuccess','Data berhasi dihapus!');
    }
}
