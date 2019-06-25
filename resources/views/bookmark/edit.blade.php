@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Bookmark</div>
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="post" action="{{route('bookmark.update', $bookmark->id) }}" name="EditBookmark">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $bookmark->name }}">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" name="link" class="form-control" value="{{ $bookmark->link }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description"value="{{ $bookmark->description}}">
                            </div>
                            <div class="form-group">
                                <label for="public" class="checkbox"><input type="checkbox" name="public" {{ $bookmark->public?'checked':'' }}> Public</label>
                            </div>
                            <div class="form-group">
                                <label for="tag" data-toggle="tooltip" data-placement="top" title="Example: book,marks," style="color:blue;">Tag (Optional)</label>
                                <input type="text" name="tag" class="form-control-file" value="{{$bookmark->tagList}}">
                            </div>
                            <button type="submit" class="btn alert-primary float-right">Update Bookmark</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection