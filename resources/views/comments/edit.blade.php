@extends('layout')
@section('title', 'Edit Page')
@section('pagetitle', 'Edit Comment')
@section('content')
    {{-- <form method="POST" action="/comments/{{ $comment->id }}" style="margin-bottom: 1em;"> --}}
        <form method="POST" action="{{ route('updaa', ['comment' => $comment->id]) }}" style="margin-bottom: 1em;">
        <!-- {{ method_field('PATCH') }}
        {{ csrf_field() }} -->
        @method('PATCH')
        @csrf

    <div class="field">
        <label class="label" for="subject">Subject</label>
    
        <div class="control">
            <input type="text" class="input" name="subject" placeholder="Subject" value="{{ $comment->subject }}">
        </div>
    </div>
    
    <div class="field">
        <label class="label" for="description">Description</label>
    
        <div class="control">
            <textarea name="description" class="textarea">{{ $comment->description }}</textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Update Comment</button>
        </div>
    </div>
    </form>

    <form method="POST" action="/comments/{{ $comment->id }}">    
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Comment</button>
            </div>
        </div>
    </form>

@endsection
