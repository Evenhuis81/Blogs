<label>
    <input type="checkbox" name="premium" onchange="checkpremfunc({{ $blog->id }})"
        {{ $blog->premium ? "checked" : "" }}>
    Premium Content
</label>
<br><br>