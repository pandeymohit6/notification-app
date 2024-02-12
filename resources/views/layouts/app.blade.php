<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RN2 Task</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel='stylesheet'>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                    <!-- Container wrapper -->
                    <div class="container-fluid">
                        <!-- Toggle button -->
                        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>

                        <!-- Collapsible wrapper -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left links -->
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                @guest
                                <li class="nav-item">
                                    <a class="btn btn-primary me-3 {{ (request()->is('users.index')) ? 'active' : '' }}" href="{{ route('users.index') }}">User List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary me-3 {{ (request()->is('notifications.index')) ? 'active' : '' }}" href="{{ route('notifications.index') }}">Notifications List</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="btn btn-primary me-3" href="#">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary me-3" href="{{ route('stop-impersonating') }}">
                                        Stop-impersonating
                                    </a>
                                </li>
                                @endguest
                            </ul>
                            <!-- Left links -->
                        </div>
                        <!-- Collapsible wrapper -->

                        <!-- Right elements -->
                        <div class="d-flex align-items-center">
                            @guest @else
                            <!-- Notifications -->
                            <div class="dropdown">
                                <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="badge rounded-pill badge-notification bg-danger">{{auth()->user()->unreadNotifications->count() ?? 0}} </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    @forelse(auth()->user()->unreadNotifications as $notify)
                                    <li>
                                        <a @if(!$notify->read_at) href="{{route('notification.read', $notify->id)}}" @endif class="list-group-item @if($notify->read_at) read @else unread @endif ">
                                            <p><b>{{$notify['data']['notification_type']}}</b> {{$notify['data']['content']}}</p>
                                            <p><small>{{ $notify->created_at->diffForHumans() }}</small></p>
                                        </a>
                                    </li>
                                    @empty
                                    <li>There is no notification</li>
                                    @endforelse
                                </ul>
                            </div>
                            @endguest
                            <!-- Avatar -->
                        </div>
                        <!-- Right elements -->
                    </div>
                    <!-- Container wrapper -->
                </nav>
                <!-- Navbar -->
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mdbootstrap@4.20.0/js/mdb.min.js"></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/notifications/changeStatus',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        $('#msg').text(data.success).show()
                    }
                });
            })
        })

        $("#navbarDropdownMenuLink").click(function() {
            $(".dropdown-menu-end").toggle();
        });
    </script>
</body>

</html>