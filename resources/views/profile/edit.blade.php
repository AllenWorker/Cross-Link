@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="/upload/avatars/{{$profile->avatar}}" alt="avatar" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ $profile->nickname }}'s Profile</h1>
                        <div class="float-left list-inline">
                            <form enctype="multipart/form-data" action="/profile" method="post">
                                @csrf
                                <label for="">Update Profile Image </label>
                                <input type="file" name="avatar">
                                <input type="submit" class="float-right btn btn-sm btn-primary" value="Upload Image">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <article>
                            <p>{{$profile->description}}</p>
                        </article>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('profile.update', $profile->id) }}" name="Update">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="nickname" class="col-form-label">Nickname</label>
                            <input class="form-control" type="text" name="nickname"
                                   value="{{$profile->nickname}}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <input class="form-control" type="text" name="description"
                                   value="{{$profile->description}}">
                        </div>
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
