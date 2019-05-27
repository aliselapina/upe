@extends('layouts.app')

@section('content')

@if(Auth::user()->loma_id == 1)
<nom_admin> </nom_admin>

@else
<nom> </nom> 
@endif

@endsection 