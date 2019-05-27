<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Atbalstitaj; 
use App\Http\Resources\Atbalstitaj as AtbalstitajResource;

class AtbalstitajController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //"iegut" atbalstitajus
         $atbalstitajs = Atbalstitaj:: orderBy('created_at', 'desc') -> paginate(10);// raadis atbalstitajus sakot ar pedejo izveidoto un pirmaas 10

         //paradiit atbalstitajus
         return view ('atbalstitaji.index')->with('atbalstitajs', $atbalstitajs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('atbalstitaji.create');
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
        //
        $atbalstitaj = new Atbalstitaj; 
        $atbalstitaj->id = $request->input('id');
        $atbalstitaj->nosaukums = $request->input('nosaukums');
        $atbalstitaj->majaslapa = $request->input('majaslapa');
        $atbalstitaj->numurs = $request->input('numurs');
        $atbalstitaj->epasts = $request->input('epasts');
        $atbalstitaj->rekviziti = $request->input('rekviziti');
        $atbalstitaj->atbalsta_veids = $request->input('atbalsta_veids');
        $atbalstitaj->nometne_id = $request->input('nometne_id');

        $atbalstitaj->save();

        return redirect('/atbalstitaji')->with('success', 'Atbalstitājs pievienots');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atbalstitaj = Atbalstitaj::find($id);
        
        return view('atbalstitaji.show')->with('atbalstitaj', $atbalstitaj);
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
        $atbalstitaj = Atbalstitaj::find($id);
        
        return view('atbalstitaji.edit')->with('atbalstitaj', $atbalstitaj);

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
        $atbalstitaj = Atbalstitaj::find($id);
        $atbalstitaj->nosaukums = $request->input('nosaukums');
        $atbalstitaj->majaslapa = $request->input('majaslapa');
        $atbalstitaj->numurs = $request->input('numurs');
        $atbalstitaj->epasts = $request->input('epasts');
        $atbalstitaj->rekviziti = $request->input('rekviziti');
        $atbalstitaj->atbalsta_veids = $request->input('atbalsta_veids');
        $atbalstitaj->nometne_id = $request->input('nometne_id');
        $atbalstitaj->save();

        return redirect('/atbalstitaji')->with('success', 'Projekts veiksmīgi rediģēts');
    

        $atbalstitaj = Atbalstitaj::find($id);
        $atbalstitaj->nosaukums = $request->input('nosaukums');
        $atbalstitaj->majaslapa = $request->input('majaslapa');
        $atbalstitaj->numurs = $request->input('numurs');
        $atbalstitaj->epasts = $request->input('epasts');
        $atbalstitaj->rekviziti = $request->input('rekviziti');
        $atbalstitaj->atbalsta_veids = $request->input('atbalsta_veids');
        $atbalstitaj->nometne_id = $request->input('nometne_id');
        $atbalstitaj->save();

        return redirect('/atbalstitaji')->with('success', 'Atbalstītājs veiksmīgi rediģēts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //atbalstitajs ieraksta atrasana
        $atbalstitaj = atbalstitaj::findOrFail($id);

        //atrastaa ieraksta dzeeshana
        if($atbalstitaj->delete()) {
        return new atbalstitajResource($atbalstitaj);
        }
    }
}
