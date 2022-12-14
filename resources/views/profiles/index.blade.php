@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex justify-content-center">
                <img class="w-100 rounded-circle" src="{{$user->profile->getImageSrc()}}" alt="" class="w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline pb-3">
                    <div class="d-flex align-items-center">
                        <h1>{{ $user->username }}</h1>

                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    </div>
                    @can('update', $user->profile)
                        <a href="/p/create">Add New Post</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
                <div class="d-flex">
                    <div class="pe-5">
                        <strong>{{$postCount}}</strong> posts
                    </div>
                    <div class="pe-5"><strong>{{$followersCount}}</strong> followers</div>
                    <div class="pe-5"><strong>{{$followingCount}}</strong> following</div>
                </div>
                <div class="pt-4 font-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description??''}}</div>
                <div><a href="#">{{$user->profile->url??''}}</a></div>
            </div>
        </div>

        <div class="row pt-4">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{$post->id}}">
                        <img class="w-100" src="/storage/{{$post->image}}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<script>
    import FollowButton from "../../js/components/FollowButton";

    export default {
        components: {FollowButton}
    }
</script>
