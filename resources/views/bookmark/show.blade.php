@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$bookmark->name}}
                        <div class="float-right list-inline nav">
                            @role('Admin')
                            <button class="nav-link btn alert-danger"  data-toggle="modal" data-target="#delete">
                                Delete </button>
                            @endrole
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Nmae</th>
                                <th>URL</th>
                                <th>Description</th>
                                <th>Belong to</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>{{$bookmark->nmae}}</td>
                                <td><a href="{{$bookmark->link}}">{{$bookmark->link}} </a></td>
                                <td>{{$bookmark->description}}</td>
                                <td>{{$bookmark->user->name}}
                                    <img src="/upload/avatars/{{$bookmark->user->profile->avatar}}"
                                            style="width:30px; height:30px;"></td>
                                <td>{{$bookmark->public?'Public':'Private'}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-header"> Tags</div>
                        <div class="card-body">
                            <ul>
                                @foreach($bookmark->tags as $tags)
                                    <li>{{$tags->name}}</li>
                                @endforeach
                            </ul>
                        </div>
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
                    <h4 class="modal-title">Delete Bookmark</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you wish to delete this Bookmark?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{Route('bookmark.destroy', $bookmark->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="button alert float-right" value="Delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
