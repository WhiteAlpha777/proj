@extends('layouts.main')
@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                value="{{ old('title')}}"
                type="text" name="title" class="form-control" id="title" placeholder="title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea
                type="text" name="content" class="form-control" id="content"
                placeholder="content">{{ old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input
                value="{{ old('image')}}"
                type="text" name="image" class="form-control" id="image" placeholder="image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    <option {{old('category_id') == $category->id ? 'selected':''}}
                            value="{{$category->id}}">
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags[]" class="form-label">Tags</label>
            <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @if(old('tags') != null )
                        @foreach(old('tags') as $oldTag)
                        {{$oldTag == $tag->id ? 'selected':''}}
                        @endforeach
                        @endif

                        value="{{$tag->id}}">{{$tag->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mb-2">Create</button>
        </div>
    </form>
    <a href="{{route('post.index')}}" class="btn btn-success mb-2">Back</a>
@endsection
