@extends('layouts.app')

@section('content')

@guest
<atbalstitaji_guest></atbalstitaji_guest>
@else
<atbalstitaji></atbalstitaji>
@endguest
@endsection
