<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\BorrowLog;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;


class FrontController extends Controller
{
    public function index()
    {
    	$barang = Barang::all();
        return view('home',compact('barang'));
    }

    public function pinjam($id)
    {
    	try {
            // dd(date('Y-m-d h:i:s'));
            $barang = Barang::findOrFail($id);
            $barang->amount = $barang->amount - 1;
            $barang->save();
            BorrowLog::create([
                'users_id' => Auth::user()->id,
                'barangs_id' => $id
                ]);
            $barang->amount = $barang->amount - 1;
        } catch (ModelNotFoundException $e) {
        }

        $barang = Barang::all();
        Session::flash("flash_notification",["level"=>"success","message"=>"Barang di Pinjam"]);

       
        return redirect('/');
    }

    public function kembali($id)
    {
    	try {
            $gg = BorrowLog::find($id);
            $barangs = Barang::find($gg->barangs_id);
	        $barangs->amount = $barangs->amount + 1;
           
            
	        $barangs->save();
            $gg->is_returned = 1;
            $gg->save();

        } catch (ModelNotFoundException $e) {
        }
        
        $barang = Barang::all();

        Session::flash("flash_notification",["level"=>"success","message"=>"Barang di Kembalikan"]);

        return redirect('/statistik');
    }

    public function search(Request $request)
    {
        $barang = DB::table('barangs')->where('nama_barang','like',"%Search%")->paginate(6);
        return $barang;
        return view('search',compact('barang'));    
    }

    public function daftarpinjaman()
    {
        $barang = DB::table('borrow_logs')->join('barangs','barangs.id','=','borrow_logs.barangs_id')->select('barangs.nama_barang','barangs.cover','borrow_logs.created_at as pinjam')->where('borrow_logs.users_id','=',Auth::user()->id)->get();
        return view('daftarpinjaman',compact('barang'));
    }
}
