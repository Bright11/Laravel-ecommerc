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
            <div class="col-md-4">
                <div class="row">
                   @forelse ($products as $item)
                   <div class="col-md-4">
                    <a href="frontendviews/details/{{$item['id']}}" class="col4class" title="{{$item['name']}} Details">
                      <div class="card proclass">
                        <img src="{{Storage::url($item['image'])}}" class="card-img-top" alt="{{$item['name']}} image">
                        <div class="card-body">
                          <h1>{{$item['name']}}</h1>
                          <p>Price: {{$item['price']}}</p>
                          <p class="card-text dscription" maxlength='20'>{{$item['discription']}}</p>
                        </div>
                    </a>
                      </div>
                </div>
                   @empty
                       <h4>No item found</h4>
                   @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection