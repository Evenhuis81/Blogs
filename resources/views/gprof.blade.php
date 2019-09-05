@extends('layout')
@section('title', 'Guest Profiles')
@section('pagetitle', 'Guest Profiles Page')
@section('content')

@foreach($users as $user)
<form method="POST" action="/guestpremium/{{ $user->id }}">
    @method('PATCH')
    @csrf
    <label><input type="checkbox" name="guestpremium{{ $user->id }}" onChange="this.form.submit()" {{ $user->premium ? "checked" : "" }}>{{ $user->last_name }} - {{ $user->email }}</label><br>
</form>
@endforeach

@endsection
