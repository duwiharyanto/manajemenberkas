<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
class user extends Controller
{
    protected $url="User";
    protected $path='public/user';
    protected $headline="daftar user";
    protected $subheadline="menu user";
    protected $view="user";
    protected $tabel="users";

    protected function config(){
        $conf=[
            'headline'=>$this->headline,
            'url'=>$this->url,
            'subheadline'=>$this->subheadline,
            'view'=>$this->view,
        ];
        return (object)$conf;
    }
    protected function validasi($request){
        $message=[
            'required'=>":attribute Wajib diisi",
        ];
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],$message);        
    }
    protected function submit($request){
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        return $data;        
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
        return view($this->view.'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'conf'=>$this->config(),
        ];
        return view($this->view.'.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validasi($request);
        $result=DB::table($this->tabel)->insert(
            $this->submit($request)
        );
        if($result){
            return redirect($this->url)->with('alertsuccess','Simpan Berhasil');
        }else{
             return redirect($this->url)->with('alerterror','Simpan gagal');
        }
        // dd($result);
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
        //dd(decrypt($id));
        $result=DB::table($this->tabel)->where('id',decrypt($id))->first();
        $data=[
            'conf'=>$this->config(),
            'data'=>$result,
        ];
        
        return view($this->view.'.edit',$data);
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

        $result=DB::table($this->tabel)->where('id',decrypt($id))->update(
            $this->submit($request)
        );
        if($result){
            return redirect($this->url)->with('alertsuccess','Update Berhasil');
        }else{
             return redirect($this->url)->with('alerterror','Update gagal');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=DB::table($this->tabel)->where('id',$id)->delete();
        if($result){
            return redirect($this->url)->with('alertsuccess','Hapus Berhasil');
        }else{
             return redirect($this->url)->with('alerterror','Hapus gagal');
        }
    }
}
