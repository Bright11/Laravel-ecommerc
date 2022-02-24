@extends('frontendviews.master')
@section('title')
    Home page
@endsection
@section('content')
<div class="container-fluid">
  <div class="myslide">
    @include('frontendviews.finclude.slider')
  </div>
</div>
    <div class="container mycontaner">
        <div class="row">
            <div class="col-md-3">
                <div class="card" >
                    <div class="card-header">
                      Categories
                    </div>
                    <ul class="list-group list-group-flush">
                      @foreach ($categories as $cart)
                      <li class="list-group-item frontendsidbar"><a href="frontendviews/viewcategory/{{$cart['id']}}">{{$cart['name']}}</a></li>
                      @endforeach

                    </ul>
                  </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                  @foreach ($products as $item)
                  <div class="col-md-4">
                    <a href="frontendviews/details/{{$item['id']}}" class="col4class" title="{{$item['name']}} Details">
                      <div class="card proclass">
                        <img src="{{asset('product/'.$item['image'])}}" class="card-img-top" alt="{{$item['name']}} image">
                        <div class="card-body">
                          <h1>{{$item['name']}}</h1>
                          <p>Price: {{$item['price']}}</p>
                          <p class="card-text dscription" maxlength='20'>{{$item['discription']}}</p>
                        </div>
                    </a>
                      </div>
                </div>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
