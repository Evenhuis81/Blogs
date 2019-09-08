@extends('layout')
@section('title', 'Edit Page')
@section('pagetitle', 'Edit Blog')
@section('content')

<form method="POST" action="/blogpremium/{{ $blog->id }}">
    @method('PATCH')
    @csrf
    <label><input type="checkbox" name="premium" onChange="this.form.submit()" {{ $blog->premium ? "checked" : "" }}>Premium Content</label><br><br>
</form>
@if ($blog->image == null)
<p><a href="/form/{{ $blog->id }}">Voeg afbeelding toe</a></p>
@else
<img src="/images/{{ $blog->image }}">
<p><a href="/form/{{ $blog->id }}">Verander afbeelding</a></p>
<form method="POST" action="/form/{{ $blog->id }}">    
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-danger">Delete Picture</button>
        </div>
    </div>
</form>
@endif
<br>
<br>

<form method="POST" action="/blogs/{{ $blog->id }}" style="margin-bottom: 1em;">
        <!-- {{ method_field('PATCH') }}
        {{ csrf_field() }} -->
        @method('PATCH')
        @csrf

    <div class="field">
        <label class="label" for="title">Title</label>
    
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{ old('title') ? old('title') :  $blog->title }}">
        </div>
    </div>
    
    <div class="field">
        <label class="label" for="description">Description</label>
    
        <div class="control">
            <textarea name="description" class="textarea">{{ old('description') ? old('description') : $blog->description }}</textarea>
        </div>
    </div>
    
    <h6>Categories:</h6>
    @foreach ($categories as $category)
        <label><input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ $blog->categories->contains($category) ? "checked" : "" }}> {{ $category->name }}</label><br>
    @endforeach
    <br>

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
    {{-- <br> --}}
    {{-- <h6>Categories:</h6> --}}

    {{-- @foreach ($categories as $category)
    <form method="POST" action="/blogs/{{ $blog->id }}">
        @method('PATCH')
        @csrf
        <label><input type="checkbox" name="category" value="{{ $category->id }}" onChange="this.form.submit()" {{ $blog->categories->contains($category) ? "checked" : "" }}> {{ $category->name }}
            <input type="hidden" name="cid" value="{{ $category->id }}"> </label><br>
    </form>
    @endforeach --}}

        {{-- <form method="POST" action="/tasks/{{ $blog->id }}">
            @method('PATCH')
            @csrf
                <label class="checkbox {{ $blog->blogtasks->completed ? 'is-complete' : ''}}" for="completed">
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $blog->blogtasks->completed ? 'checked' : '' }}>
                    {{ $blog->blogtasks->description }}
                </label>
            </form> --}}
            <br>
    @include('errors')
@endsection

