@extends('navlayout')
@section('content')
<div class="container mt-5">
    <h2>{{ $Link->title }} Content Preview:</h2>
    <p>{!! $content !!}</p>
</div>
@endsection
