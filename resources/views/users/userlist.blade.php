@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">User list</div>
            <div class="p-5 text-center bg-body-tertiary">
                <a data-mdb-ripple-init class="btn btn-primary" href="{{ route('createusers') }}" role="button">Create 10 More Users</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <p id="msg"></p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Notification Count</th>
                            <th scope="col">Action</th>
                            <th scope="col">Notification Sataus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userlist as $key => $user)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td><span class="badge badge-primary rounded-pill d-inline">@if($user->unreadNotifications) {{$user->unreadNotifications->count()}} @else 0 @endif</span></td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a> | <a href="{{ route('impersonate', $user->id) }}" class="btn btn-secondary btn-sm">impersonate him</a></td>
                            <td>
                            <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->notification ? 'checked' : '' }}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection