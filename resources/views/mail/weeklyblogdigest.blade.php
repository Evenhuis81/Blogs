@component('mail::message')
# Weekly digest

Here's all the blogs from the last week. Enjoy.
example:
@foreach ($blogs as $blog)
{{ $blog->title }}

@component('mail::button', ['url' => ''])
View Blogs
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent