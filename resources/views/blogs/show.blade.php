@extends('layout')
@section('title', 'Show a Blog')
@section('pagetitle', 'Show Blog')
@section('content')

<h1 class="title">Title: {{ $blog->title }} {{ $blog->premium ? "(premium content)" : "" }}</h1>

    <div class="content">
        <h4>Description: {{ $blog->description }}</h4>
        @if ($blog->categories->count())
            <p>Categories: @foreach ($blog->categories as $category) {{ $category->name }} @endforeach</p>
        @endif
        @if ($blog->image !== null)
            <img src="/images/{{ $blog->image }}">
        @endif
         @if (auth()->user()->role == 'writer' && $blog->owner_id == auth()->user()->id || auth()->user()->role == 'admin')
        <p><a href="/blogs/{{ $blog->id }}/edit">Edit Blog</a></p>
        @endif
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
    {{-- {{ dd($blog->comments->count()) }} --}}
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
                    <p>owner:<strong> {{ $comment->owner->last_name }}</strong></p>
                </div>
                @if ($comment->owner_id == auth()->user()->id || auth()->user()->role == 'admin')
                <a href="/comments/{{ $comment->id }}/edit">Edit Comment</a>
                @endif
                @if (auth()->user()->role == 'admin')
                {{-- <a href="/comments/{{ $comment->id }}">Delete Comment</a> --}}
                <form method="POST" action="/comments/{{ $comment->id }}">    
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button">Delete Comment</button>
                            {{-- Must it be a button? or a link ... no, look it up how to make it a link ? maybe --}}
                        </div>
                    </div>
                </form>
                @endif
            </div>
        @endforeach
        
    @endif 

@endsection
