@extends('layouts.app')

@section('content')
    <div>
        <div class="content container">
            <h1>{{$title}}</h1>
            @if(count($services)>0)
            <ul>
                @foreach($services as $service)
                    <li>{{$service}}</li>
                @endforeach
            </ul>
                @endif
        </div>
    </div>
    </body>
    </html>
@endsection