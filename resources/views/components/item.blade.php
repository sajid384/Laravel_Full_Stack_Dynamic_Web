@extends('navlayout')

@section('content')
<div class="container mt-5">
    <h2>{{ $page->title }} Content Preview:</h2>
    <p>{!! $page->content !!}</p>
</div>
@endsection
