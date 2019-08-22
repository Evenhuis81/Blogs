@extends('layout')
@section('title', 'Show a Blog')
@section('pagetitle', 'Show Blog')
@section('content')

<h1 class="title">Title: {{ $blog->title }} </h1>

    <div class="content">
        <h4>Description: {{ $blog->description }}</h4>
        <p><a href="/blogs/{{ $blog->id }}/edit">Edit Blog</a></p>
        </div>

    <form class="box" method="POST" action="/blogs/{{ $blog->id }}/comments/">
        @csrf

        <div class="field">
            <label class="label" for="description">New Comment</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="Description" value="{{ old('description') }}" required>
            </div>

            <div class="control">
                <input type="text" class="input {{ $errors->has('subject') ? 'is-danger' : '' }}" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Comment</button>
            </div>
        </div>
        @include ('errors')
    </form>

    @if ($blog->comments->count())
    
        @foreach ($blog->comments as $comment)
            <div class="box">
                <div class="">
                    <p>subject: <strong>{{ $comment->subject }}</strong></p>
                </div>
                <div class="">
                    <p><span style="font-size: 12px">description:</span> {{ $comment->description }}</p>
                </div>
                <div class="">
                    <p>owner:<strong> {{ $comment->owner->lastname }}</strong></p>
                </div>
                <a href="/comments/{{ $comment->id }}/edit">Edit Comment</a>
            </div>
        @endforeach
        
    @endif 

@endsection
