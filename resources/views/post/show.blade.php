@extends('layouts.app')

@yield('content')
@section('content')

@include('layouts.rowtop')


<h3>
    {{ $post->title }}
</h3>

<div >
    <code>{{ $post->user->name }}</code>
</div>
<div>
    {{ $post->published_at }}
</div>


<p>{{ $post->body }}</p>
<p>
    <a href="{{ URL::previous() }}" class="btn btn-primary btn-xs">Back</a>
</p>
<hr>



@include('layouts.rowbottom')
@endsection