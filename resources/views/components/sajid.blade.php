@extends('navlayout')
@section('content')
<div class="container mt-5">
    <h2>{{ $page->title }} Content Preview:</h2>
    <td>{!! $page->content !!}</td>

</div>
@endsection