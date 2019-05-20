<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        //"iegut" nometnes
        $lietotaji = Lietotaj:: orderBy('created_at', 'desc') -> paginate(10);// raadis nometnes sakot ar pedejo izveidoto un pirmaas 10

        //paradiit nometnes
        return LietotajResource:: collection($lietotaji);
    }

}
