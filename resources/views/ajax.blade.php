@foreach ($blogs as $blog)
<a href="/blogs/{{ $blog->id }}">Blog title: {{ $blog->title }} >> Blog description: {{ $blog->description }} >>  Written by: {{ $blog->author->last_name }} >> created: {{ $blog->created_at->diffForHumans() }}</a><br>
    Category: 
     @foreach ($blog->categories as $category)
     {{ $category->name }}
     @endforeach
<p>------------------------------------------------------------------------------------------------------------------------------</p>
@endforeach
