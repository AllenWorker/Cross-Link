@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <img src="/upload/avatars/{{$user->profile->avatar}}" alt="avatar" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h2>{{ $user->profile->nickname }}'s Profile</h2>
                <a href="profile/{{$user->profile->id}}/edit" class="pull-right btn btn-sm btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
