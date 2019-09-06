@extends('layout')
@section('title', 'Profile')
@section('pagetitle', 'Profile Page')
@section('content')

<h1>Profile for:</h1>
<h2>first name: {{ auth()->user()->first_name }}</h2>
<h3>last name: {{ auth()->user()->last_name }}</h3>
<h4>e-mail: {{ auth()->user()->email }}</h4>
<h5>role: {{ auth()->user()->role }}</h5>
@if (auth()->user()->role == 'guest')
<h6>premium guest: {{ auth()->user()->premium ? 'yes' : 'no' }}</h6>
@elseif (auth()->user()->role == 'admin')
<a href="/guestprofiles">Set premium for guestusers</a>
@elseif (auth()->user()->role == 'writer')
@foreach ($blogs as $blog)
<a href="/blogs/{{ $blog->id }}">Blog title: {{ $blog->title }} >> Blog description: {{ $blog->description }} >> created at: {{ $blog->created_at->diffForHumans() }}</a><br>
    Category: 
     @foreach ($blog->categories as $category)
     {{ $category->name }}
     @endforeach
<p>------------------------------------------------------------------------------------------------------------------------------</p>
@endforeach

@endif
<hr>
<a href="{{ route('blogs') }}">Please click here to continue to the blogs</a>
@endsection





{{-- // Profiel voor:
// First Name:
// Last Name:
// E-mail:
// Password:
// Role:
// (if guest: premium/no)

// Wijzigen gegevens knop
// Bekijk blogberichten
// Bekijk commentaren --}}
