@extends('layouts.main')
@section('content')
    <div>
        This is Posts page
        <div>
            <a href="{{route('post.create')}}" class="btn btn-success mb-2" >Add one</a>
        </div>
        <div>
            <a href="{{route('post.recycle')}}" class="btn btn-success mb-2" >Recycle</a>
        </div>
        <div>
            @if(count($posts) != 0)
            <table class="table table-success table-striped">
                <thead>
                <tr>
                    @foreach($posts[0]->getAttributes() as $item => $p)
                        <th scope="col">{{$item}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            @foreach($post->getAttributes() as $p)
                                <th scope="col"><a href="{{route('post.show',$post->id)}}">{{$p}}</a></th>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div  class="mt-3">
            {{$posts->withQueryString()->links()}}
        </div>

    </div>

@endsection
