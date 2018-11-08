@extends('layouts.app')

@section('content')

    <div class="content container">

        <h1>EDIT POST</h1>

        {!! Form::open(['action' => ["PostsController@update", $post->id], 'method'=> 'POST', 'enctype'=>'multipart/form-data' ]) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {{Form::label('name', 'Title')}}
            {{Form::text('name', $post->name, ['class'=>'form-control', 'placeholder'=> 'Title', 'required' => 'required'])}}
        </div>


        <div class="form-group">
            {{Form::label('text', 'Content')}}
            {{Form::textarea('text', $post->text, ['id' => 'article-ckeditor','class'=>'form-control', 'placeholder'=> 'Content', 'required' => 'required'])}}
        </div>
        <div>
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', '', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}

    </div>

@endsection