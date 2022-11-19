@extends('layouts.main')
@section('content')
    <div>
        This is Recycle page
        <div>
            <form action="{{route('post.restore')}}" method="post">
                @csrf
                @method('post')
                <input type="submit" value="Restore all" class="btn btn-success mb-2">
            </form>
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
        <div>
            <a href="{{route('post.index')}}" class="btn btn-success mb-2" >Back</a>
        </div>

    </div>
@endsection
