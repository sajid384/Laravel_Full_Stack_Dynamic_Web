@extends('navlayout')
@section('content')
<div>
    <h1>{{ $page->title }}</h1>
    <p>{!! $page->content !!}</p> <!-- Assuming 'content' is a column in your NavLink table -->
</div>
@endsection