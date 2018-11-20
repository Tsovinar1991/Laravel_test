@extends('layouts.app')
@section('content')
    <div class="content container">
        <a href="/posts" class="btn btn-default">Go back</a>
        <h1>POST</h1>
        <div class="row">
            @if(count($post)> 0)
                <div class="well">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <img src="/storage/cover_images/{{$post->cover_image}}" alt=""
                                     style="width:200px; height:200px;object-fit:cover;">
                                <p>Written on {{$post->created_at}}</p>
                                @foreach($post->creators as $creator)
                                     <p>Creator: {{$creator->name}} {{$creator->lastname}}</p>
                                @endforeach
                                @if(!Auth::guest())
                                    @if(Auth::user()->id === $post->user_id )
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                                        {!!Form::open(['action' => ["PostsController@destroy", $post->id ], 'method'=> 'POST', 'class'=>'pull-right', 'onsubmit' => 'return confirm("Delete?");' ])!!}
                                        {{Form::hidden('_method', 'DELETE' )}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger', ])}}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h3>{{$post->name}}</h3>
                            <h6>{!!$post->text!!}</h6>

                        </div>
                    </div>
                </div>
            @else
                <p>No Posts Found.</p>
            @endif

        </div>

    </div>

    <hr>



@endsection