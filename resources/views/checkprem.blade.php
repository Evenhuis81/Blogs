<label>
    <input type="checkbox" name="premium" onchange="checkpremfunc({{ $blog->id }})"
        {{ $blog->premium ? "checked" : "" }}>
    Premium Content
</label>
@if (session('message'))
<p style="color: purple">{{ session('message') }}</p>
@endif
<br><br>