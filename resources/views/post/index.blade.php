@extends('layouts.app')
@yield('content')
@section('content')

@if ($posts->count() == 0)
<h3><center>no blogs are available</center></h3>
@else

@foreach ($posts as $post_row)

<h3>
    <a href="{{ route('post.show', $post_row->id) }}">
        {{ $post_row->title }}
    </a>
</h3>

<div >
    <code>{{ $post_row->user->name }}</code>
</div>
<div>
    {{ $post_row->published_at }}
</div>


<p>{{ str_limit($post_row->body, 255) }}</p>
<p>
    @if (Auth::user())
    <a href="{{ route('post.show', $post_row->id) }}" class="btn btn-info  btn-xs">View</a>
    <a href="{{ route('post.edit', $post_row->id) }}" class="btn btn-primary btn-xs">Edit</a>
    <a href="{{ route('post.delete', $post_row->id) }}" class="btn btn-danger btn-xs">Delete</a>   
    @endif
</p>
<hr>

@endforeach
@endif
@endsection







