@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><b>Notification</b></div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <form method="POST" action="{{ route('notifications.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Notification type:</strong>
                                <select name="notification_type" id="notification_type" class="form-control">
                                    <option value="">Select one</option>
                                    @foreach($notifyType as $atype)
                                    <option value="{{$atype}}">{{Str::ucfirst($atype)}}</option>
                                    @endforeach
                                </select>
                                @error('notification_type')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Content:</strong>
                                <input type="text" name="content" value="{{old('content')}}" class="form-control">
                                @error('content')
                                <span class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Expiration Time:</strong>
                                <input type="text" name="exp_time" value="{{old('exp_time')}}" class="form-control">
                                @error('exp_time')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>User List:</strong>
                                <select multiple name="user_ids[]" id="user_ids" class="form-control">
                                    @foreach($userlist as $user)
                                    <option value="{{$user->id}}">{{Str::ucfirst($user->name)}}</option>
                                    @endforeach
                                </select>
                                @error('user_ids')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection