@extends('layouts.app')
@yield('content')
@section('content')

@include('layouts.rowtop')

{!! Form::open(['method' => 'DELETE', 'route'=>['post.destroy', $post->id]]) !!}
<div class="form-group">
    <div class="alert alert-success">Are you sure?</div>
</div>
<div class="form-group">
    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-primary btn-xs">Back</a>
</div>
{!! Form::close() !!}
@include('layouts.rowbottom')



@stop