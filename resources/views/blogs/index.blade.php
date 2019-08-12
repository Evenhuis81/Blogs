@extends('layout')
@section('title', 'Blogs')
@section('pagetitle', 'Blogs')
@section('content')

<div id="container">
    <h3>Overview all blogs:</h3>
    <ul>
        @foreach ($blogs as $blog)
            <li><a href="/blogs/{{ $blog->id }}">Blog title: {{ $blog->title }} >> Blog description: {{ $blog->description }} >>  Written by: {{ $blog->author->last_name }} >> created: {{ $blog->created_at->diffForHumans() }}<br>
                 >> Category: </a></li>
                 <p>------------------------------------------------------------------------------------------------------------------------------</p>
        @endforeach
    </ul>
    <br>
</div>

<div>
    <p>sort by:</p>
    @switch($sortMethod)
        @case('newold')
            <p style="pointer-events: none; text-decoration: underline; color: green;" >latest blog -> first blog</p>
            <a href="/sortoldnew"><p style="text-decoration: underline; color: blue;">first blog -> latest blog</a></p>
            <a href="/sortauthor" style="color: blue"><p style="text-decoration: underline;">author (A->Z)</a></p>
            @break
        @case('author')
            <a href="/blogs"><p style="text-decoration: underline; color: blue;">latest blog -> first blog</p></a>
            <a href="/sortoldnew"><p style="text-decoration: underline; color: blue;">first blog -> latest blog</p></a>
            <p style="pointer-events: none; color:green; text-decoration: underline;">author (A->Z)</p>
            @break
        @case('oldnew')
            <a href="/blogs"><p style="text-decoration: underline; color: blue;">latest blog -> first blog</p></a>
            <p style="pointer-events: none; color: green; text-decoration: underline;">first blog -> latest blog</p>
            <a href="/sortauthor"><p style="text-decoration: underline; color: blue;"> author (A->Z)</p></a>
            @break
    @endswitch
</div>

<div id="container">
    <p>categories:</p><br>
    {{-- foreach categorie etc, checkbox --}}
</div>
@endsection

@section('button')
    <br>
    <br>
    <form method="get" action="/blogs/create">
        <button class="button is-dark" type="submit">Create new Project</button>
    </form>
@endsection