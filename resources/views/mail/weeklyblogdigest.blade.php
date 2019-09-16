@component('mail::message')
# Weekly digest

Here's all the blogs from the last week. Enjoy.
example:
{{-- @foreach ($dblogs as $blog)
{{ $blog->title }}
@endforeach --}}

@component('mail::button', ['url' => ''])
View Blogs
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent