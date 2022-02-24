@extends('frontendviews.master')
@section('title')
   {{$products->name}}
@endsection
@section('content')
    <div class="container mycontaner">
        <div class="mydetailsstyle">
            <div class="text-center collections">
                <h1>Collections :<a href="{{route('viewcategory',$products->category->id)}}">{{$products->category->name}}</a>/{{$products->name}}</h1>
            </div>
        <div class="row">
                <div class="col-md-5">

                    <img src="{{asset('product/'.$products->image)}}" class="card-img-top" alt="{{$products->name}} image">
                </div>

                <div class="col-md-6 prodetails">

                    <div class="detailspron">
                        <h1> {{$products->name}}</h1>
                    </div>
                    <div class="detailspron">
                        <p>Price {{$products->price}}</p>
                    </div>
                    <form action="{{route('addprotocart')}}" method="POST">
                        @csrf
                    <div class="detailspron detailsaddtocart">
                        <input type="number" name="prod_qty" class="qty-input" value="1"/>
                    </div>
                    @if (Session::has('user'))
                    <input type="hidden" name="user_id" value="{{Session::get('user')['id']}}"/>
                    @endif
                    <div class="detailspron detailsaddtocart">
                        <input type="hidden" name="prod_id" class="pro_id" value="{{$products->id}}"/>
                        <input type="hidden" name="prod_name" class="pro_id" value="{{$products->name}}"/>
                        <input type="hidden" name="prod_price" class="pro_id" value="{{$products->price}}"/>
                        <input type="hidden" name="prod_image" class="pro_id" value="{{$products->image}}"/>
                    <button type="submit">add to cart<i class="fa fa-cart-arrow-down"></i></button>

                    </div>
                    </form>
                    <div class="detailspron">

                        <p> {{$products->discription}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
