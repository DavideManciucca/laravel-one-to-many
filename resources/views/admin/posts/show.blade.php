@extends('layouts.app')

@section('content')
<h1>Title: <span style="text-decoration:underline">{{$post->title}}</span> </h1>
<div class=" d-flex " >
    <h2>ID:{{$post->id}}</h2>
    <div style="margin-left: 20px"></div>

    @if ($post->category)

    <h2>Category: {{$post->category->name}}</h2>
    <div style="margin-left: 20px"></div>

    @endif



    <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">EDIT</a>
    <div style="margin-left: 20px"></div>

    <form onsubmit="return confirm('vuoi eliminare il campo?')" class="d-inline" action="{{route('admin.posts.destroy', $post)}}" method="POST">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger" >DELETE</a>
        </form>
</div>
<p>{{$post->content}}</p>

<a class="btn btn-primary" href="{{route('admin.posts.index')}}"> <- GO BACK</a>

@endsection
