@extends('layout')
@section('title', 'Guest Profiles')
@section('pagetitle', 'Guest Profiles Page')
@section('content')

@if (session('gprem'))
<p style="color: purple">{{ session('gprem') }}</p>
<br>
@endif

@foreach($users as $user)
<form method="POST" action="/guestpremium/{{ $user->id }}">
    @method('PATCH')
    @csrf
    <label class="labl"><input type="checkbox" name="premium" onChange="this.form.submit()" id="{{ $user->id }}"
            {{ $user->premium ? "checked" : "" }}>{{ $user->last_name }} - {{ $user->email }} >>> digest week
        {{ date('W') }}:
        <span id="sguest{{ $user->id }}">{{ !is_null($user->digest) ? "Yes" : "No" }}</span></label><br>

</form>
@endforeach
<hr>

<h1>Week {{ date('W') }}: bundel berichten en stuur per e-mail naar gebruiker:</h1>

<form method="POST" action="digest">
    {{-- @method('PATCH') --}}
    @csrf
    <select id="selectt" name="digestselect" oninput="test(this)">
        <optgroup label="Premium Guests">
            {{-- <option disabled selected value> -- select an option -- </option> --}}
            <option id="opthid" style="display:none"></option>
            @foreach($users as $user)
            @if ($user->premium)
            <option value="{{ $user->id }}">{{ $user->last_name }}</option>
            @endif
            @endforeach
        </optgroup>
        <optgroup label="Non-Premium Guests">
            @foreach($users as $user)
            @if (!$user->premium)
            <option value="{{ $user->id }}">{{ $user->last_name }}</option>
            @endif
            @endforeach
        </optgroup>
    </select>
    <button id="btnx" type="submit">Send Digest</button>
</form>
<p id="msg"></p>
<a href="digest2" id="msg2"></a>
@if (session('digestsent'))
<p style="color: purple">{{ session('digestsent') }}</p>
@endif

@endsection