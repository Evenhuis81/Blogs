@extends('layout')
@section('title', 'Edit Categories')
@section('pagetitle', 'Edit Categories')
@section('content')
    <form method="POST" action="/categories/{{ $category->id }}" style="margin-bottom: 1em;">
        <!-- {{ method_field('PATCH') }}
        {{ csrf_field() }} -->
        @method('PATCH')
        @csrf

    <div class="field">
        <label class="label" for="name">Name</label>
    
        <div class="control">
            <input type="text" class="input" name="name" placeholder="Name" value="{{ $category->name }}">
        </div>
    </div>
    
    <div class="field">
        <label class="label" for="description">Description</label>
    
        <div class="control">
            <textarea name="description" class="textarea">{{ $category->description }}</textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Update Category</button>
        </div>
    </div>
    </form>

    <form method="POST" action="/categories/{{ $category->id }}">    
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Category</button>
            </div>
        </div>
    </form>

@endsection