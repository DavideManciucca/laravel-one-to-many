@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edita -> {{$post->title}}</h2>
    <form action="{{route('admin.posts.update', $post)}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label  class="form-label">Titolo articolo</label>
          <input type="text" class="form-control" value="{{old($post->title)}}" id="title" name="title">
        </div>

        <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

          </select>

        <div class="mb-3">
            <label  class="form-label">Contenuto</label>
            <textarea class="form-control" name="content" value="{{old($post->content)}}" id="content" cols="30" rows="10">

            </textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="{{route('admin.posts.index',$post)}}"> <-GO BACK</a>
      </form>
</div>

@endsection
