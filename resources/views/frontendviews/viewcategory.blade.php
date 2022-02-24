@extends('frontendviews.master')
@section('title')
{{$categories->name}}
@endsection
@section('content')

    <div class="container mycontaner">
      <div class="text-center mb-5">
        <h3>{{$categories->name}}</h3>
      </div>
        <div class="row">
          @foreach ($products as $item)
                  <div class="col-md-4">
                    <a href="{{route('details',$item['id'])}}" class="col4class" title="{{$item['name']}} Details">
                    <div class="card proclass">
                      <img src="{{asset('product/'.$item['image'])}}" class="card-img-top" alt="{{$item['name']}} image">
                      <div class="card-body">
                        <h1>{{$item['name']}}</h1>
                        <p>Price: {{$item['price']}}</p>
                        <p class="card-text dscription" maxlength='20'>{{$item['discription']}}</p>
                      </div>
                  </div>
                </a>
                  </div>
                  @endforeach

                </div>
            </div>

@endsection
