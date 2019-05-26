@extends('layouts.app')

@section('content')
<a href="/" class="nav-link" >Atpakaļ</a>

@guest
<atbalstitaji_guest></atbalstitaji_guest>
@else
<atbalstitaji></atbalstitaji>
@endguest
@endsection
