
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User edit
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.update', $user->id)}}" name="EditUser">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                    >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row">
                                @foreach ($roles as $role)
                                    <label class="form-check text-md-right">
                                        <input
                                                type="checkbox"
                                                name="roles[]"
                                                value="{{$role->id}}"
                                                id="{{$role->id}}"
                                                @if($user->hasRole($role->name)) checked=checked @endif
                                        >{{ $role->name }}
                                    </label>
                                @endforeach
                            </div>
                            <button class="btn-primary btn float-right" type="submit"> update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
