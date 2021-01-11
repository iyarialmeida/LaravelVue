<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
       
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $over_100 = DB::table('all_decks')->where( 'public', true )
                                          ->where( 'rate', '>', 100 ) 
                                          ->get();

        $rate70_100 = DB::table('all_decks')->where( 'public', true )
                                            ->whereBetween( 'rate', [70, 100])
                                            ->get();
        
        $rate30_69 = DB::table('all_decks')->where( 'public', true )
                                            ->whereBetween( 'rate', [30, 69])
                                            ->get();

        $rate0_29 = DB::table('all_decks')->where( 'public', true )
                                           ->whereBetween( 'rate', [0, 29])
                                           ->get();
        
        return view( 'home', [
            'over_100' => $over_100,
            'r70_100' => $rate70_100,
            'r30_69' => $rate30_69,
            'r0_29' => $rate0_29
        ] );
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
}
