@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button class="btn" data-toggle="collapse" data-target="#add">Add Social Media</button>
                <div id="add" class="collapse">
                    <div class="card col-lg-12 col-sm-12 m-1">
                        <div class="card-header">Add social Media</div>
                        <div class="card-body">
                            <form method="post" action="{{url('social')}}" name="AddSocialLink">
                                @csrf
                                <div class="form-group">
                                    <label for="link_name" class="col-form-label">Social Link Name</label>
                                    <input class="form-control" type="text" name="link_name">
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-form-label">URL</label>
                                    <input class="form-control" type="url" name="url">
                                </div>
                                <button type="submit" class="btn btn-success float-right">Add Social Link</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-12 col-sm-12 m-1">
                    <div class="card-header">Social Link</div>
                    <div class="card-body">
                        @foreach($profile->social_link as $social_link)
                            <div>
                                <ul>
                                    <li> {{$social_link->link_name}}: {{$social_link->url}}
                                        <button class="btn alert-danger" data-toggle="modal" data-target="#delete">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="delete">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Social Link</h4>
                                                        <button type="button" class="close" data-dismiss="modal">×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('social.destroy',$social_link->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" class="button alert float-right"
                                                                   value="Delete"/>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
