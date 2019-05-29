<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Nometne;  
use App\Http\Resources\Nometne as NometneResource;

class NometneController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //"iegut" nometnes
        $nometnes = Nometne:: orderBy('sakums', 'desc') -> paginate(10);// raadis nometnes sakot ar pedejo izveidoto un pirmaas 10

        //paradiit nometnes
        return view ('nometnes.index')->with('nometnes', $nometnes);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nometnes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        //
        $nometne = new Nometne; 
        $nometne->nosaukums = $request->input('nosaukums');
        $nometne->sakums = $request->input('sakums');
        $nometne->beigas = $request->input('beigas');
        $nometne->vieta = $request->input('vieta');
        $nometne->dalib_sk = $request->input('dalib_sk');
        $nometne->apraksts = $request->input('apraksts');

        $nometne->save();
        
        return redirect('/nometnes')->with('success', 'Nometne pievienota');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ieguust vienu konkretu nometni 
        $nometne = Nometne::find($id);
        

        //paradiit sho konkreto nometni 
        return view('nometnes.show') -> with('nometne', $nometne);
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //konkretas nometnes redigesana
        $nometne = Nometne::find($id);

        return view('atbalstitaji.edit')->with('nometne'->$nometne);
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

        $nometne = new Nometne; 
        $nometne->id = $request->input('nometne_id');
        $nometne->sakums = $request->input('sakums');
        $nometne->beigas = $request->input('beigas');
        $nometne->vieta = $request->input('vieta');
        $nometne->dalib_sk = $request->input('dalib_sk');
        $nometne->apraksts = $request->input('apraksts');

        $nometne->save();
        
        return redirect('/nometnes')->with('success', 'Nometne rediģēta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //nometnes ieraksta atrasana
        $nometne = Nometne::findOrFail($id);

        //atrastaa ieraksta dzeeshana
        if($nometne->delete()) {
        return redirect('/nometnes')->with('success', 'Nometne dzēsta');
        }
    }
}
