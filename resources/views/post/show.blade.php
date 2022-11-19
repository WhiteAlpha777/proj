@extends('layouts.main')
@section('content')
    <div>
        This is Posts page
        <div>{{$post->id}}. {{$post->title}} /
        {{$post->content}}</div>
        <a href="{{route('post.edit',$post->id)}}" class="btn btn-success mb-1">Edit</a>
        <form action="{{route('post.delete',$post->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-success mb-1">
        </form>
        <a href="{{route('post.index')}}" class="btn btn-success mb-1">Back</a>

    </div>
@endsection
