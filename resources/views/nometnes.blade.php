@extends('layouts.app')

@section('content')
<a href="/" class="nav-link" >Atpakaļ</a>
<nometnes></nometnes>
<script>Vue.component('nometnes', require('./components/nometnes.vue').default);</script>
@endsection
