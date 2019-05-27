<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Nometne; 
use App\Http\Resources\Nometne as NometneResource;

class NometneController extends Controller

{

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $nometne = $request->isMethod('put') ? Nometne::findOrFail($request->nometne_id) : new Nometne;
        // echo $request;
        
        //$nometne->id = $request->input('id');
        $nometne->id = $request->input('nometne_id');
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
    public function show(Nometne $nometne)
    {
        //ieguust vienu konkretu nometni 
        $nometne = Nometne::where('id', $nometne ->id);

        //paradiit sho konkreto nometni 
        return view('nometnes.show', ['nometne' => $nometne]);
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
        $nometne = Nometne::find($id);
        return new NometneResource($nometne);
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
