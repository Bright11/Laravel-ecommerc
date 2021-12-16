<?php 
use App\Http\Controllers\frontend\frontendcontroller;
//if(Session::has('user'))
$totalss =frontendcontroller::cartItem();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Bright C Web Developer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('cartpage')}}">Cart <i class="fa fa-cart-arrow-down"></i>{{$totalss}}</a>
          </li>
          @if (Session::has('user'))
          
          <li class="nav-item">
            <a class="nav-link" href="">{{Session::get('user')['name']}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
          </li>
          
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
          
          @endif
          
        </ul>
        <form class="d-flex" action="{{route('searchitem')}}" method="get">
          @csrf
          <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  @include('frontendviews.finclude.message')