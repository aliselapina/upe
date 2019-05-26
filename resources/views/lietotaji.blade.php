@extends('layouts.app')

@section('content')

<a href="/" class="nav-link" >Atpakaļ</a>

@if(Auth::user()->loma_id == 1)

<user></user>

@else <user_dalib></user_dalib>

@endif
@endsection