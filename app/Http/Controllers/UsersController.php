<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Lietotaj; 
use App\Http\Resources\Lietotaj as LietotajResource;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //"iegut" lietotajus
        $lietotajs = Lietotaj:: orderBy('created_at', 'desc') -> paginate(10);// raadis lietotajus sakot ar pedejo izveidoto un pirmaas 10

        //paradiit lietotajus
        return LietotajResource:: collection($lietotajs);
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
        $lietotaj = $request->isMethod('put') ? Lietotaj::findOrFail($request->$id) : new Lietotaj;

        $lietotaj->id = $request->input('id');
        $lietotaj->name = $request->input('name');
        $lietotaj->email = $request->input('email');
      

        if($lietotaj->save()){
            return new LietotajResource($lietotaj);
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
        $lietotaj = Lietotaj::findOrFail($id);

        //paradiit sho konkreto nometni 
        return new LietotajResource($lietotaj);
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
        //lietotaji ieraksta atrasana
        $lietotaj = Lietotaj::findOrFail($id);

        //atrastaa ieraksta dzeeshana
        if($lietotaj->delete()) {
        return new LietotajResource($lietotaj);
        }
    }

}
