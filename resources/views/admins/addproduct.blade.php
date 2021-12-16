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
                    <form action="addprotodb" method="POST" enctype="multipart/form-data">
                     @csrf
                        <label for="name ">Product name</label>
                        <input type="text" class="form-control" name="name" placeholder="Product name"/>
                        <select class="form-control" name="cart_id">
                            <option>Select Categories</option>
                            @foreach ($categories as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
                        <label for="name ">Product price</label>
                        <input type="number" class="form-control" name="price" />
                        <label for="name ">Product discount</label>
                        <input type="text" class="form-control" name="discount"/>
                        <label for="name ">Product discription</label>
                       <textarea class="form-control" name="discription" placeholder="product discription"></textarea>
                       <label for="name ">Product Keywords</label>
                       <textarea class="form-control" name="keywords" placeholder="Keywords"></textarea>
                        <label for="name ">Product image</label>
                        <input type="file" class="form-control" name="image"/>
                        <input type="submit" class="form-control mysubmitbtn">
                    </form>
                 </div>
            </div>
        </div>
    </div>
@endsection