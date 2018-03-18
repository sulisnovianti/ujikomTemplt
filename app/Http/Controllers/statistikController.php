<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class statistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($request->ajax()){
            $stats = BorrowLog::with('barang','user');
            if($request->get('status')=='returned') $stats->returned();
            if($request->get('status')=='not-returned') $stats->borrowed();
            return Datatables::of($stats)
            ->addColumn('returned_at',function($stat){
                if ($stat->is_returned)
                {
                    return $stat->updated_at;
                }
                return "Masih Dipinjam";
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'barang.title','name'=>'barang.title','title'=>'Nama Barang']);
        return view('statistics.index')->with(compact('html'));
    }

    public function member(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){

            $stats = BorrowLog::with('barangs','user')->where('user_id',Auth::user()->id);
            if($request->get('status')=='returned') $stats->returned();
            if($request->get('status')=='not-returned') $stats->borrowed();
            return Datatables::of($stats)
            ->addColumn('returned_at',function($stat){
                if ($stat->is_returned)
                {
                    return $stat->updated_at;
                }
                return "Masih Dipinjam";
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'barangs.title','name'=>'barangs.title','title'=>'Nama Barang'])
        ;
        return view('statistics.member')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function pinjaman()
    {
        $pinjaman = DB::table('borrow_logs')->join('barangs','barangs.id','=','borrow_logs.barangs_id')->join('users','users.id','=','borrow_logs.users_id')->select('barangs.*','users.*')->where('borrow_logs.is_returned','=',0)->get();
        return view('dashboard',compact('pinjaman'));
    }
}
