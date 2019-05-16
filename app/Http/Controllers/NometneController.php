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
        $nometnes = Nometne:: orderBy('created_at', 'desc') -> paginate(10);// raadis nometnes sakot ar pedejo izveidoto un pirmaas 10

        //paradiit nometnes
        return NometneResource:: collection($nometnes);
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
        $nometne = $request->isMethod('put') ? Nometne::findOrFail($request->$id) : new Nometne;

        $nometne->id = $request->input('id');
        $nometne->nosaukums = $request->input('nosaukums');
        $nometne->sakums = $request->input('sakums');
        $nometne->beigas = $request->input('beigas');
        $nometne->vieta = $request->input('vieta');
        $nometne->dalib_sk = $request->input('dalib_sk');
        $nometne->apraksts = $request->input('apraksts');

        if($nometne->save()){
            return new NometneResource($nometne);
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
        //ieguust vienu konkretu nometni 
        $nometne = Nometne::findOrFail($id);

        //paradiit sho konkreto nometni 
        return new NometneResource($nometne);
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
        //nometnes ieraksta atrasana
        $nometne = Nometne::findOrFail($id);

        //atrastaa ieraksta dzeeshana
        if($nometne->delete()) {
        return new NometneResource($nometne);
        }
    }
}
