@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/admin" role="button"
                            aria-controls="offcanvasExample">
                            Admin
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/employee" role="button"
                            aria-controls="offcanvasExample">
                            Employee
                        </a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-top: 10px;">
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/PersonalInformation" role="button"
                            aria-controls="offcanvasExample">
                            Personal Information
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
