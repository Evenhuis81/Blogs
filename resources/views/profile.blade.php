@extends('layout')
@section('title', 'Profile')
@section('pagetitle', 'Profile Page')
@section('content')

<h1>Profile for:</h1>
<h2>{{ auth()->user()->first_name }}</h2>
<h3>{{ auth()->user()->last_name }}</h3>
<h4>{{ auth()->user()->email }}</h4>
<h5>{{ auth()->user()->role }}</h5>
@if (auth()->user()->role == 'guest')
<h6>premium guest: {{ auth()->user()->premium ? 'yes' : 'no' }}</h6>
@elseif (auth()->user()->role == 'admin')
<a href="/guestprofiles">Set premium for guestusers</a>
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
