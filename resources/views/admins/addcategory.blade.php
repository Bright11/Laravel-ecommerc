@extends('admins.amaster')
@section('title')
    category
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
                    <form action="addcartodb" method="POST" enctype="multipart/form-data">
                     @csrf
                        <label for="name ">Category name</label>
                        <input type="text" class="form-control" name="name" placeholder="Category name"/>
                        <label for="name ">Category image</label>
                        <input type="file" class="form-control" name="image"/>
                        <input type="submit" class="form-control mysubmitbtn">
                    </form>
                 </div>
            </div>
        </div>
    </div>
@endsection