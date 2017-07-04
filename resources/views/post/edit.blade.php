@extends('layouts.app')

@yield('content')
@section('content')

@include('layouts.rowtop')

{!! Form::model($post,['method' => 'PATCH','route'=>['post.update',$post->id]]) !!}

{!! Form::hidden('user_id',Auth::user()->id) !!}

@include('alerts.errors')
@include('alerts.success')

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'body' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Published at:') !!}
    {!! Form::text('published_at',$post->published_at,['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('active', ' Active Status:') !!}
    {!! Form::checkbox('active', '1', $post->active, ['class'=>'form-control_none', 'id'=>'active', 'data-size'=>'mini']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-success btn-xs    ']) !!}
    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger btn-xs">Delete</a>
    <a href="{{ URL::previous() }}" class="btn btn-primary btn-xs">Back</a>
</div>
{!! Form::close() !!}
@include('layouts.rowbottom')
@endsection