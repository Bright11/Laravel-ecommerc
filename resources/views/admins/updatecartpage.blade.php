@extends('admins.amaster')
@section('title')
    Update category
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
                    <form action="{{route('editcartodb',$categories['id'])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                       
                     
                        <label for="name ">Category name</label>
                        <input type="text" class="form-control" name="name" value="{{$categories['name']}}"/>
                        <label for="name ">Category image</label>
                        <input type="file" class="form-control" name="image"/>
                        <img src="{{Storage::url($categories['image'])}}" width="80"/>
                        <input type="submit" class="form-control mysubmitbtn">
                    </form>
                 </div>
            </div>
        </div>
    </div>
@endsection