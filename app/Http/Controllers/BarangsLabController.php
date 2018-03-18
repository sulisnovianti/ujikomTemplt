<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang;
use Session;

class BarangsLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $barang = DB::table('barangs')
            ->join('jenis', 'jenis.id','=','barangs.id_jenis')
            ->select('barangs.*','jenis.nama')
            ->where('barangs.id_jenis',1)->get();
        return view('barangs.lab')->with(compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangs.createlab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang'     =>'required|unique:barangs,nama_barang',
            'amount'    =>'required|numeric']);

         $barang = new Barang;
        $barang->id_jenis = 1;
        $barang->nama_barang = $request->nama_barang;
        //isi filed cover juika ada cover yang diupload
        if($request->hasFile('cover')){
            //mengambil file yang di upload
            $uploaded_cover = $request->file('cover');
            //mengambil extention file
            $extention = $uploaded_cover->getClientOriginalExtension();
            //membuat nama file rendom berikut extention
            $filename = md5(time()).'.'.$extention;

            //menyimpan cover 
            $destinationPath = public_path(). DIRECTORY_SEPARATOR.'img';
            $uploaded_cover->move($destinationPath,$filename);

            //mengisi field
            $barang->cover = $filename;
        }

       $barang->amount = $request->amount;
        $barang->save();


        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menyimpan $barang->nama_barang"]);

        return redirect()->route('barangslab.index');
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
        $barang = Barang::find($id);
        return view('barangs.editlab')->with(compact('barang'));
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
        $this->validate($request, [
            'nama_barang'     =>'required',
            'amount'    =>'required|numeric']);
        
        $barang = Barang::find($id);
        $barang->id_jenis = 1;
        $barang->nama_barang = $request->nama_barang;
        //isi filed cover juika ada cover yang diupload
        if($request->hasFile('cover')){
            //mengambil file yang di upload
            $uploaded_cover = $request->file('cover');
            //mengambil extention file
            $extention = $uploaded_cover->getClientOriginalExtension();
            //membuat nama file rendom berikut extention
            $filename = md5(time()).'.'.$extention;

            //menyimpan cover 
            $destinationPath = public_path(). DIRECTORY_SEPARATOR.'img';
            $uploaded_cover->move($destinationPath,$filename);

            //mengisi field
            $barang->cover = $filename;
        }
        $barang->amount = $request->amount;
        $barang->save();


        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menyimpan $barang->nama_barang"]);
        return redirect()->route('barangslab.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barangslab.index');
    }
}
