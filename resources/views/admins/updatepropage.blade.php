@extends('admins.amaster')
@section('title')
    Add product
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
                    <form action="{{route('updateprotodb',$products['id'])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                     @csrf
                        <label for="name ">Product name</label>
                        <input type="text" class="form-control" name="name" value="{{$products->name}}"/>
                        <label for="name ">Product price</label>
                        <input type="number" class="form-control" name="price" value="{{$products->price}}" />
                        <label for="name ">Product discount</label>
                        <input type="text" class="form-control" name="discount" value="{{$products->discount}}"/>
                        <label for="name ">Product discription</label>
                       <textarea class="form-control" name="discription">{{$products->discription}}</textarea>
                       <label for="name ">Product Keywords</label>
                       <textarea class="form-control" name="keywords" placeholder="Keywords">{{$products->keywords}}</textarea>
                        <label for="name ">Product image</label>
                        <input type="file" class="form-control" name="image"/>
                        <img src="{{Storage::url($products->image)}}" width="80"/>
                        <input type="submit" class="form-control mysubmitbtn">
                    </form>
                 </div>
            </div>
        </div>
    </div>
@endsection