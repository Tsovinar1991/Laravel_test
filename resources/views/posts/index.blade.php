@extends('layouts.app')
@section('content')
    <div class="content container" >
        <h1>POSTS</h1>
        @if(isset($success))
        <div class="success">
            <h3>$success</h3>
        </div>

        @endif

        <div>
            @if(count($posts)> 0)
                @foreach($posts as $post)
                    <div class="well ">
                        <h3><a href="{{url("/posts/$post->id")}}">{{$post->name}}</a></h3>
                        {{--<h6>{!!$post->text!!}</h6>--}}
                    </div>
                @endforeach
                {{$posts->links()}}


            @else
                <p>No Posts Found.</p>
            @endif
        </div>
    </div>
@endsection