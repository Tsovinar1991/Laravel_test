@extends('layouts.app')

@section('content')
    
    <form method="get">
        <input type="text" placeholder="Search" name="search">
        <input type="submit" value="Find" name="submit">
    </form>

    
<ul>
    @foreach($list as $key => $item)

        <li>
            <a href="http://laravel.loc/home/show/{{ $item->id }}"> {{ $item->name }} </a>
        </li>
    @endforeach
</ul>
@endsection
