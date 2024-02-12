@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Notification list</div>
            <div class="p-5 text-center bg-body-tertiary">
                <a data-mdb-ripple-init class="btn btn-primary" href="{{ route('notifications.create') }}" role="button">Create New Notification</a>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Data</th>
                            <th>User</th>
                            <th>Notification Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $notification)
                        @php $arraydata = json_decode($notification['data']);@endphp
                        <tr>
                            <td>
                                <p class="fw-normal mb-1">{{$arraydata->content}}</p>

                            </td>
                            <td>{{$notification['users']['email']}} </td>
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
@endsection