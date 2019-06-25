@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome to Cross-Link!
                    @hasanyrole('UserAdmin|Admin')
                        <p>Hello Admin<p>
                    @else
                        @role('Ban')
                            <p>Sorry, your Account is baned due to suspicious activities </p>
                            <p>Please contact Admin for further information.</p>
                        @else
                            <p> Hello User!</p>

                        @endrole
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
