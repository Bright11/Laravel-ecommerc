@extends('admins.amaster')
@section('title')
   Admin Home Page
@endsection

@section('content')
    <div class="container">
        @include('admins/message')
        <div class="row">
            <div class="col-md-3">
                @include('admins/sidebar')
            </div>
            <div class="col-md-9">
                <div class="myform">
                   
                 </div>
            </div>
        </div>
    </div>
@endsection