@extends('layouts.app')

@section('content')
<div class="container">
 Ciao {{Auth::user()->name}}, hai raggiunto la index della tua crud

 <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post )

        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->category ? $post->category->name : '-' }}</td>
          <td><a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">SHOW</a>
            <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">EDIT</a>
            <form onsubmit="return confirm('vuoi eliminare il campo?')" class="d-inline" action="{{route('admin.posts.destroy', $post)}}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" >DELETE</a>
                </form>

        </td>

        </tr>
        @endforeach


    </tbody>
  </table>
  {{$posts->links()}}

  <div class="container">
    @foreach ($categories as $category )
    <h4>{{$category->name}}</h4>
    <ul>
        @forelse ($category->posts as $post )
            <li><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></li>
        @empty
            <li>There are no categories</li>
        @endforelse
    </ul>

    @endforeach


  </div>


</div>
@endsection
