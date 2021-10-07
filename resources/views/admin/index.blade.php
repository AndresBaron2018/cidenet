@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dataTables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dataTables/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container-fluid" id="app">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Users</b>
                </div>
                <div class="card-body">
                    @include('template._message')
                    <admin-index :users="{{ $users }}" :roles="{{ $roles }}" />
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/js/dataTables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables/jszip.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables/buttons.html5.min.js') }}"></script>
@endsection
