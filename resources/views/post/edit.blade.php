@extends('layouts.main')
@section('content')
    <form action="{{route('post.update',$post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Content</label>
            <textarea type="text" name="content" class="form-control" id="content" placeholder="content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="image" value="{{$post->image}}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example"  name = "category_id">
                @foreach($categories as $category)
                    <option {{$post->category_id === $category->id ? 'selected':''}}
                        value="{{$category->id}}">
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tags</label>
            <select class="form-select" multiple aria-label="multiple select example" name = "tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? 'selected':''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary  mb-2">Update</button>
    </form>
    <a href="{{route('post.index')}}" class="btn btn-success mb-2">Back</a>
@endsection
