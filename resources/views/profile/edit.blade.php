@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <img src="/upload/avatars/{{$profile->avatar}}" alt="avatar" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h2>{{ $profile->nickname }}'s Profile</h2>
            </div>
            <div class="card">
                <div class="card-header"> Update Profile</div>
                <div class="card-body">
                    <form method="post" action="{{route('profile.update', $profile->id) }}" name="Update">
                        @method('PATCH')
                        @csrf
                        <label class="form-group" for="">Update Profile Image </label>
                        <input class="form-control" type="file" name="avatar">
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
    </div>
@endsection
