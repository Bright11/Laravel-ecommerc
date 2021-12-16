@extends('frontendviews.master')
@section('title')
    Cart page
@endsection
@section('content')

    <div class="container mycontaner">
        <div class="table">
            <div class="table-responsive">
                <table class="table">
                   
                    <thead>
                        <tr>
                            <th scope="col">Numbers</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Images</th>
                            <th scope="col">Total Price</th>
                            
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($cart as $key=> $item)
                        <tr>
                            <th>{{$key+1}}</th>
                         
                         <th>{{$item->prod_name}}</th>
                         <th>{{$item->prod_price}}</th>
                         
                         <th>{{$item->prod_qty}}</th>
                         <th><img src="{{Storage::url($item->prod_image)}}" class="cartimg"/></th>
                         <th>{{$item->prod_price * $item->prod_qty}}</th>
        
                           
                           <th><button><a href="{{route('removecart',$item->id)}}">Delete</a></button></th>
                           
                        </tr>
                        
                           @empty
                           <tr>
                          <th>no item</th>
                     </tr>
                     
                     @endforelse
                     <tr>
                        <th colspan="3">Continu Shopping</th>
                        <th colspan="3"></th>
                        <th colspan="3"><h5>Total {{$sum}}</h5></th>
                    </tr>
                    </tbody>

                </table>
                
            </div>
        </div>
      </div>
 
@endsection