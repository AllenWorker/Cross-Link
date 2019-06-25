@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users List
                        <div class="float-right list-inline nav">
                            <form action="user/search" method="POST" role="search">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Search Username">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Details</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td><p>{{$user->id}}</p></td>
                                    <td><img src="/upload/avatars/{{$user->profile->avatar}}"
                                             style="width:30px; height:30px;">
                                        {{$user->name}}
                                    </td>
                                    <td><p>{{$user->email}}</p>
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                    <td>
                                        <a href="/user/{{$user->id}}">View Details</a>
                                    </td>

                                    @if($user->name != 'Admin')
                                        <td>
                                            <button class="btn alert-danger" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you wish to delete this user?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{route('user.destroy', $user->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="button alert float-right" value="Delete"/>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
