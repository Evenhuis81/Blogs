@extends('layout')
@section('title', 'Blogs')
@section('pagetitle', 'Blogs')
@section('content')


    <h3>Overview blogs:</h3>
    <div id="bloggies">
        @include('ajax')
        {{-- @yield('blogs.indexall') --}}
    </div>
<br>
{{-- <div>
    <p>sort by:</p>
    @switch($sortMethod)
        @case('newold')
            <p style="pointer-events: none; text-decoration: underline; color: green;" >latest blog -> first blog</p>
            <a href="/sortoldnew"><p style="text-decoration: underline; color: blue;">first blog -> latest blog</p></a>
            <a href="/sortauthor"><p style="text-decoration: underline; color: blue">author (A->Z)</p></a>
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
</div> --}}

<p>categories:</p>
        <p>--------</p>
        <label><input id="checkall" type="checkbox" name="checkall" onchange="checkall()" checked disabled>ALL</label><br>
        <p>--------</p>
    <div id="container">
    @foreach ($categories as $category)
        <label><input class="sortcat" type="checkbox" name="categories[]" onchange="category()" value="{{ $category->id }}">{{ $category->name }}</label><br>
    @endforeach
</div>
@endsection

@section('button')
    <br>
    <br>
    <form method="get" action="/blogs/create">
        <button class="button is-dark" type="submit">Create new Project</button>
    </form>
@endsection