<div id="container">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('blogs') }}">Blogs</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('contact') }}">Contact</a>
    <a href="{{ route('categories') }}">Categories</a>
    <a href="{{ route('profile') }}">Profile</a><span>_________</span>
    @guest
    <a href="{{ route('register') }}">Register</a> or
    <a href="{{ route('login') }}">Login</a>
    <p>You're not logged in</p>
    @else
        Welcome Mr/Mrs {{ auth()->user()->last_name }}.
        (<a href="href="{{ route('logout') }}"            
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>)
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</div>