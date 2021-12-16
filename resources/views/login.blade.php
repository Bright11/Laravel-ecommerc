@extends('frontendviews.master')
@section('title')
   Login form
@endsection
@section('content')

    <div class="container mycontaner">
        <div class="loginform">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
            <form action="addlogin" method="POST">
                @csrf
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email@name.com"/>
                <label for="name">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password ******"/>
                <input type="submit" class="form-control"/>
            </form>
    </div>    
    </div>
@endsection