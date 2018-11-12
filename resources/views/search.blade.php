@extends('layouts.app')

@section('content')
    <div class="content container">
        <h1>Search Result</h1>
        @if(isset($success))
            <div class="success">
                <h3>$success</h3>
            </div>
        @endif
        <div>
            @if(count($query)> 0)
                @foreach($query as $post)
                    <div class="well ">
                        <h3><a href="{{url("/posts/$post->id")}}">{{$post->name}}</a></h3>
                        {{--<h6>{!!$post->text!!}</h6>--}}
                    </div>
                @endforeach
            @else
                <p>No Posts Found.</p>
            @endif
        </div>
    </div>
@endsection