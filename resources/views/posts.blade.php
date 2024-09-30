@extends('Components.layout')

@section('content')
@if($posts->count())
@include('Components.post-header')
@include('Components.featured-post' , ['post'=>$posts[0]])
<div class="row">
@foreach ($posts as $post)
@include('Components.post-card')
@endforeach
@else
<p>No Posts Found</p>
@endif
</div>
@endsection


