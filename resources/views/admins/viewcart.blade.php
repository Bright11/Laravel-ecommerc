@extends('admins.amaster')
@section('title')
View Categories
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
                   <div class="table">
                       <div class="table-responsive">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th scope="col">Numbers</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Images</th>
                                       <th scope="col">Update</th>
                                       <th scope="col">Delete</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($categories as $key=> $item)
                                   <tr>
                                       <th>{{$key+1}}</th>
                                    <th>{{$item['name']}}</th>
                                    <th><img src="{{asset('catigory/' .$item['image'])}}" width="80"/></th>
                                    <th><a href="/admins/updatecartpage/{{$item['id']}}" class="btn btn-success">Update</a></th>
                                    <th><a href="#" class="btn btn-danger">Delet</a></th>
                                </tr>
                                   @endforeach
                               </tbody>
                           </table>
                           </table>
                       </div>
                   </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
