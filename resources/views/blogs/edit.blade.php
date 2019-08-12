@extends('layout')
@section('title', 'Edit Page')
@section('pagetitle', 'Edit Blog')
@section('content')
    <form method="POST" action="/blogs/{{ $blog->id }}" style="margin-bottom: 1em;">
        <!-- {{ method_field('PATCH') }}
        {{ csrf_field() }} -->
        @method('PATCH')
        @csrf

    <div class="field">
        <label class="label" for="title">Title</label>
    
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{ $blog->title }}">
        </div>
    </div>
    
    <div class="field">
        <label class="label" for="description">Description</label>
    
        <div class="control">
            <textarea name="description" class="textarea">{{ $blog->description }}</textarea>
        </div>
    </div>

    <div class="box">
        @foreach ($blog->categories as $category)
        <div>
            {{-- <form method="POST" action="/tasks/{{ $task->id }}"> --}}
            {{-- @method('PATCH')
            @csrf --}}
            
            <label class="checkbox {{ $category->id ? 'is-complete' : ''}}" for="completed">
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $category->id ? 'checked' : '' }}>
                    {{ $category->name }}
                </label>
            {{-- </form> --}}
        </div>

        @endforeach
    </div>




    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Update Blog</button>
        </div>
    </div>
    </form>

    <form method="POST" action="/blogs/{{ $blog->id }}">    
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Blog</button>
            </div>
        </div>
    </form>

@endsection

