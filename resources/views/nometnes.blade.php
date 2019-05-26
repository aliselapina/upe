@extends('layouts.app')

@section('content')
<a href="/" class="nav-link" >Atpakaļ</a>

@guest
<nometnes_guest></nometnes_guest>
@else
<nometnes></nometnes>
@endguest

@endsection
