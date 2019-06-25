@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="/upload/avatars/{{$user->profile->avatar}}" alt="avatar" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ $user->profile->nickname }}'s Profile</h1>
                        <div class="float-right list-inline nav">
                            <a href="profile/{{$user->profile->id}}/edit" class="nav-link">Edit</a>
                            <a href="social" class="nav-link">Social Media</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <article>
                            <p>{{$user->profile->description}}</p>
                        </article>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="bookmark/create" class="float-left btn btn-sm btn-primary">Add Bookmark</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive-sm table-responsive-md">
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($user->bookmark as $bookmark)
                            <tr>
                                <td><p>{{ $bookmark->name }}</p></td>
                                <td><a href="{{ $bookmark->link }}">{{ $bookmark->link }}</a></td>
                                <td><p>{{ $bookmark->description }}</p></td>
                                <td><p>{{ $bookmark->public?'Public':'Private' }}</p></td>
                                <td><a href="bookmark/{{$bookmark->id}}/edit" class="btn btn-sm btn-info">Edit</a></td>
                                <td>
                                    <form action="{{route('bookmark.destroy',$bookmark->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-right">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
@endsection
