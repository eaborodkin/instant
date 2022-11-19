@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pe-3">
                            <img src="{{$post->user->profile->getImageSrc()}}" alt="" class="w-100 rounded-circle" style="max-width: 50px">
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0"><a href="/profile/{{$post->user->id}}" class="text-dark">{{$post->user->username}}</a></h5>
                        </div>
                        <div class="fw-bold">
                            <a href="#" class="ps-3">Follow</a>
                        </div>
                    </div>
                    <hr>
                    <p>{{$post->caption}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
