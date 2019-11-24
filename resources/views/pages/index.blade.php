@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    <h2>Welcome to Cross-Link</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive-sm table-responsive-md">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>User</th>
                        </tr>
                        @foreach($bookmarks as $bookmark)
                            <tr>
                                <td>{{$bookmark->id}}</td>
                                <td>{{$bookmark->name}}</td>
                                @if($bookmark->public == 1)
                                    <td>Public</td>
                                @else
                                    <td>Private</td>
                                @endif
                                <td><a href="/users/{{$bookmark->user->id}}">{{$bookmark->user->name}}</a></td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <span>Cross-Link 2019</span>
            </div>
        </div>
    </div>
@endsection
