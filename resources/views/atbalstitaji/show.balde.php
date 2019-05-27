@extends('layouts.app')

@section('content')

<a href="/atbalstitaji" class="btn btn-secondary">Atpakaļ</a>
    <a href="/atbalstitaji/{{$atbalstitaj->id}}/edit" class="btn btn-secondary">Rediģēt</a>
   
    <br><br>
    <h1>{{$atbalstitaj->nosaukums}}</h1>
    <p>
        <b>Atbalsta veids {{$atbalstitaj->atbalsta_veids}};</b>
        <br>
        Mājaslapa: {{$atbalstitaj->majaslapa}}
        <br>
        Kontaktinformācija: 
        <br>
        {{$atbalstitaj->epasts}}
        <br>
        {{$atbalstitaj->numurs}}
    </p>


@endsection
