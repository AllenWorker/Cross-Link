@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Book Mark</div>
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="post" action="{{route('bookmark.store') }}" name="AddBookmark">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" name="link" class="form-control" value="{{ old('link') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description"value="{{ old('description') }}">
                            </div>
                            <div class="form-group">
                                <label for="public" class="checkbox"><input type="checkbox" name="public"> Public</label>
                            </div>
                            <div class="form-group">
                                <label for="tag" data-toggle="tooltip" data-placement="top" title="Example: book,marks," style="color:blue;">Tag (Optional)</label>
                                <input type="text" name="tag" class="form-control-file">
                            </div>
                            <button type="submit" class="btn alert-primary float-right">Add Bookmark</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection