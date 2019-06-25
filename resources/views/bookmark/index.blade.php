@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">BookMarks
                        <div class="float-right list-inline nav">
                            <form action="{{url('bookmark/search')}}" method="POST" role="search">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key"
                                           placeholder="Search BookMarks">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Belong to</th>
                                <th>Detail</th>
                            </tr>
                            @foreach($bookmarks as $bookmark)
                                    <tr>
                                        <td>{{$bookmark->id}}</td>
                                        <td>{{$bookmark->name}}</td>
                                        <td>{{$bookmark->public?'Public':'Private'}}c</td>
                                        <td>{{$bookmark->user->name}}</td>
                                        <td>
                                            <a href="/bookmark/{{$bookmark->id}}">View Details</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="card-footer">
                        {{ $bookmarks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection