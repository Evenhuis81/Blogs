@extends('layout')
@section('title', 'Home')
@section('pagetitle', 'Home Page')
@section('content')
{{-- <h3>Overview last 3 blogs:</h3>
<a href="/blogs"><div id="container">
    <ul>
        @foreach ($blogs as $blog)
            <li>Blog title: {{ $blog->title }} >> Blog description: {{ $blog->description }} >>  Written by: {{ $blog->author->lastname }} >> created: {{ $blog->created_at->diffForHumans() }}</li>
        @endforeach
    </ul>
</div></a>
<p>Links to index page Blogs</p> --}}

<h1>Welcome to the blogs page .... blabla .... please register , have fun , enjoy your stay and all that</h1>
<a href="{{ route('blogs') }}">Please click here to continue to the blogs</a>
@endsection