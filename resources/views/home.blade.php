@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <div class="panel-heading" >
                            <h3>Welcome {{Auth::user()->name}}</h3>
                        </div>
                        <div class="panel-group">
                            <div class="well">
                                <a href="/posts/create" class="btn btn-primary">Create Post</a>
                            </div>
                        </div>
                        <div>
                            <tr>
                                @if(count($posts)> 0)
                                    <h4>Your blog Posts</h4>
                                    <table width="700px" class="well" >

                                            @foreach($posts as $post)

                                                <tr>
                                                    <td>{{$post->name}}</td>
                                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                                    <td>
                                                        {!!Form::open(['action' => ["PostsController@destroy", $post->id ], 'method'=> 'POST', 'class'=>'pull-right' ])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach

                                    </table>
                                    {{$posts->links()}}
                                    <div class="well">
                                        {!! Form::open(['action' => 'HomeController@search', 'method'=> 'POST' ], ['class'=>'form-control']) !!}

                                        <div class="form-group">
                                            {{ csrf_field() }}
                                            {{Form::search('search', '', ['id' => 'test','class'=>'form-control'])}}
                                        </div>
                                        {{Form::submit('Search Posts', '', ['class'=>'btn btn-default'])}}

                                        {!! Form::close() !!}
                                    </div>
                                @else
                                    <p>No Posts Found.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection



