@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Welcome to Notification Pannel</div>
            <div class="card-body">
                <div>
                    Use bootstrap class for
                    <span class="d-inline bg-info">display: inline</span>
                    to wrap the text inside the element to normally.

                    While using the property <span class="d-inline-block">display: inline-block</span>
                    will wrap the element to prevent the text inside from extending beyond its parent.

                    Lastly, using the property <span class="d-block">display: block</span>
                    will put the element on it's own line and fill its parent.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection