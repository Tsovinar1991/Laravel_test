@extends('layouts.app')

@section('content')

    <div class="content container">

        <h1>CREATE POST</h1>

        {!! Form::open(['action' => 'PostsController@store', 'method'=> 'POST',  'enctype'=>'multipart/form-data' ]) !!}
        {{ csrf_field() }}
        <div class="form-group">
        {{Form::label('name', 'Title')}}
        {{Form::text('name', '', ['class'=>'form-control',  'placeholder'=> 'Title', 'required' => 'required'])}}
        </div>


        <div class="form-group">
            {{Form::label('text', 'Content')}}
            {{Form::textarea('text', '', ['id' => 'article-ckeditor','class'=>'form-control', 'placeholder'=> 'Content', 'required' => 'required'])}}
        </div>

        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
             {{Form::submit('Submit', '', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}

    </div>

@endsection