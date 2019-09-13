@extends('layout')
@section('title', 'Guest Profiles')
@section('pagetitle', 'Guest Profiles Page')
@section('content')

@foreach($users as $user)
<form method="POST" action="/guestpremium/{{ $user->id }}">
    @method('PATCH')
    @csrf
    <label><input type="checkbox" name="premium" onChange="this.form.submit()" id="guest{{ $user->id }}"
            {{ $user->premium ? "checked" : "" }}>{{ $user->last_name }} - {{ $user->email }} >>> digest week 36:
        <span id="sguest{{ $user->id }}">{{ $user->digest ? "Yes" : "No"}}</span></label><br>

</form>
@endforeach
<hr>

<h1>Week 36: bundel berichten en stuur per e-mail naar gebruiker:</h1>

{{--<div id="">
        @include('')
        @yield('blogs.indexall')
    </div> --}}

<script>

</script>

<form method="POST" action="/digest">
    {{-- @method('PATCH') --}}
    @csrf
    <select name="digestselect" oninput="test(this)">
        <optgroup label="Premium Guests">
            @foreach($users as $user)
            @if ($user->premium)
            <option value="guest{{ $user->id . $user->digest }}">{{ $user->last_name }}</option>
            @endif
            @endforeach
        </optgroup>
        <optgroup label="Non-Premium Guests">
            @foreach($users as $user)
            @if (!$user->premium)
            <option value="guest{{ $user->id }}">{{ $user->last_name }}</option>
            @endif
            @endforeach
        </optgroup>
    </select>
    <button id="btnx" type="submit">Send Digest</button>
</form>
<p id="msg"></p>

@endsection