@extends('layouts.app')

@section('content')


@guest

@else

@if(Auth::user()->loma_id == 1)

<div style="margin-left: 2em;">
<a href="/users" class="btn btn-secondary" style="display:inline-block">Atpakaļ</a>
    <a href="/users/{{$user->id}}/edit" class="btn btn-warning" style="display:inline-block">Rediģēt</a>
    {!!Form::open(['action'=>['UserController@destroy', $user->id], 'method'=>'post'])!!}
    {{Form::hidden('_method', 'delete')}}
    {{Form::submit('Dzēst', ['class'=>'btn btn-danger mt-1'])}}
    {!!Form::close() !!}
   
    <br><br>
    <h1>{{$user->name}}</h1>
    <p>
        <b>Vārds</b>
        {{$user->vārds}}
        <br>
        <b>E-pasts: </b>
        <br>
        {{$user->email}}
       
    </p>
</div> 
@else
<div style="margin:2em; width: 98%">
<a href="/users" class="btn btn-secondary" style="display:inline-block">Atpakaļ</a>
<br><br>
<h1>{{$user->name}}</h1>
    <p>
    <b>Vārds</b>
        {{$user->vārds}}
        <br>
        <b>E-pasts: </b>
        <br>
        {{$user->email}}
    </p>
</div>
@endif
@endguest
@endsection
