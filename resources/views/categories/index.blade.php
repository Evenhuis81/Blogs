@extends('layout')
@section('title', 'Categories')
@section('pagetitle', 'Categories Page')
@section('content')

<div id="container">
    <ul>
        @foreach ($categories as $category)
            <li class="box"><strong><a href="/categories/{{ $category->id }}/edit">{{ $category->name}}</a></strong><br>{{ $category->description }}<li>
        @endforeach
    </ul>
    <p>Click on a category name to edit or delete</p>
</div>

<form class="box" method="POST" action="/categories/">
    @csrf

    <div class="field">
        <label class="label" for="name">New Category</label>

        <div class="control">
            <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" required>
        </div>

        <div class="control">
            <input type="text" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="Description" value="{{ old('description') }}" required>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Add Category</button>
        </div>
    </div>
    @include ('errors')
</form>


@endsection

