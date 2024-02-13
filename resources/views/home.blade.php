@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Notification list</div>
                        <div class="card-body">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Data</th>
                                        <th>User</th>
                                        <th>Notification Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(auth()->user()->Notifications as $key => $notification)

                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1">{{$notification['data']['notification_type']}}</p>

                                        </td>
                                        <td>{{$notification['data']['content']}} -- {{ $notification->created_at->diffForHumans() }}</td>
                                        <td><span class="badge @if($notification['read_at']) badge-success @else badge-primary @endif  rounded-pill d-inline">@if($notification['read_at']) Read @else UnRead @endif</span></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        No data
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection