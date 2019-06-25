@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <img src="/upload/avatars/{{$user->profile->avatar}}" alt="avatar" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h2>{{ $user->profile->nickname }}'s Profile</h2>
                <a href="social" class="btn btn-info">Social Media</a>
                <a href="profile/{{$user->profile->id}}/edit" class="pull-right btn btn-sm btn-primary">Edit</a>
            </div>
            <article>
                <p>{{$user->profile->description}}</p>
            </article>
            <div>

            </div>
            <div>
                <a href="bookmark/create" class="pull-right btn btn-sm btn-primary">Add Bookmark</a>
            </div>
            <div class="col-12">
                <table>
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
