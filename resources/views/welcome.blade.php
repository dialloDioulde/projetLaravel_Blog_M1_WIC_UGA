@extends('layouts.app')


@section('content')
    <ul>
        @foreach ( $p as $post )
            <a href="/article/{{$post->post_name}}"><li>Titre : {{ $post->post_title}}</li></a>
            <br/>
        @endforeach
    </ul>



@endsection
