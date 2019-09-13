@component('mail::message')
# New Blog: {{ $blog->title }}

{{ $blog->description }}

{{-- @component('mail::button', ['url' => '{{ route('index') }}' . $blog->id]) --}}
@component('mail::button', ['url' => '/blogs/' . $blog->id])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent