<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('home',compact('barang'));
    }

    public function statistik()
    {
        $barang = DB::table('borrow_logs')->join('barangs','borrow_logs.barangs_id','=','barangs.id')->join('users','borrow_logs.users_id','=','users.id')->select('borrow_logs.*','barangs.id as id_b','barangs.nama_barang','users.name')->where('borrow_logs.is_returned','=',0)->get();
        return view('peminjam',compact('barang'));
    }

    public function template()
    {
    
        return view('welcome');
    }

    public function search(Request $request)
    {
            $query = $request->get('r');
            $barang = Barang::Where('nama_barang','LIKE','%'. $query.'%')->get();
            // dd($barang);
            return view('cari',compact('barang'));
          
    }

      
}
