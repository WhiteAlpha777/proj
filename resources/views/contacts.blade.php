@extends('layouts.main')
@section('content')
    <div>
        This is Contacts page
    </div>
    <div>Find tags with posts id = 1</div>
    <div>
        <?php dump($tags);?>
    </div>
    <div>Find posts with tags = 1</div>
    <div>
        <?php dump($posts);?>
    </div>
@endsection
