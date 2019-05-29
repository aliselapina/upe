@extends('layouts.app')

@section('content')


@guest

@else

@if(Auth::user()->loma_id == 1)

<div style="margin-left: 2em;">
<a href="/atbalstitaji" class="btn btn-secondary" style="display:inline-block">Atpakaļ</a>
    <a href="/atbalstitaji/{{$atbalstitaj->id}}/edit" class="btn btn-warning" style="display:inline-block">Rediģēt</a>
    {!!Form::open(['action'=>['AtbalstitajController@destroy', $atbalstitaj->id], 'method'=>'post'])!!}
    {{Form::hidden('_method', 'delete')}}
    {{Form::submit('Dzēst', ['class'=>'btn btn-danger mt-1'])}}
    {!!Form::close() !!}
   
    <br><br>
    <h1>{{$atbalstitaj->nosaukums}}</h1>
    <p>
        <b>Atbalsta veids: </b>
        {{$atbalstitaj->atbalsta_veids}}
        <br>
        <b>Mājaslapa: </b>
        <br>
        {{$atbalstitaj->majaslapa}}
        <hr>
        <b> Kontaktinformācija: </b>  
        <br>
        {{$atbalstitaj->epasts}}
        <br>
        {{$atbalstitaj->numurs}}
    </p>
</div> 
@else
<div style="margin:2em; width: 98%">
<a href="/atbalstitaji" class="btn btn-secondary" style="display:inline-block">Atpakaļ</a>
<br><br>
<h1>{{$atbalstitaj->nosaukums}}</h1>
    <p>
        <b>Atbalsta veids: </b>
        {{$atbalstitaj->atbalsta_veids}}
        <br>
        <b>Mājaslapa: </b>
        <br>
        {{$atbalstitaj->majaslapa}}
        <hr>
        <b> Kontaktinformācija: </b>  
        <br>
        {{$atbalstitaj->epasts}}
        <br>
        {{$atbalstitaj->numurs}}
    </p>
</div>
@endif
@endguest
@endsection
