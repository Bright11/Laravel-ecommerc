@extends('frontendviews.master')
@section('title')
   Registration form
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
            <form action="sendregistertodb" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Full name"/>
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email@name.com"/>
                <label for="name">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password ******"/>
                <label for="name">Confirm Password</label>
                <input type="text"confirmpassword name="" class="form-control" placeholder="confirm password ******"/>
                <input type="submit" class="form-control"/>
            </form>
    </div>    
    </div>
@endsection