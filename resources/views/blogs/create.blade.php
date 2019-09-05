@extends('layout')
@section('title', 'Create Blog')
@section('pagetitle', 'Create New Blog')
@section('content')

<form method="POST" action="/blogs">
    @csrf
    
    <div class="field">
        <label class="label" for="title">Blog Title</label>

        <div class="control">
            <input
            type="text"
            class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
            name="title"
            value="{{ old('title') }}"
            required>
        </div>
    </div>

    <div class="field">
        <label class="label" for="description">Blog Description</label>

        <div class="control">
            <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required>
            {{ old('description') }}
            </textarea>
        </div>
    </div>






    
    {{-- <div>
        <input type="hidden" name="owner_id" placeholder="Type 1" value="1">
    </div> --}}

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Create Blog</button>
        </div>
    </div>

    @include('errors')
</form>

@endsection



