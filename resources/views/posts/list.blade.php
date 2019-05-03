@extends('welcome')
@section('content')
    <div>Hello {{ $user->name }} ({{ $user->posts_count }} posts)</div>
    <ul>
    @foreach($user->posts as $post)
        <li>{{ $post->title }}</li>
    @endforeach
    </ul>
@stop
@section('title', 'demo application')
@section('header')
    <h1>Custom Header</h1>
@stop