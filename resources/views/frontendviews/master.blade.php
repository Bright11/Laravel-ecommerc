<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/./botstrap.css"/>
    <link rel="stylesheet" href="/./frontendcss.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/./jquery.js"></script>
    <script src="/./frontendjs.js"></script>
</head>
<body>
    {{View::make('frontendviews/finclude.navbar')}}
    @yield('content')
@include('frontendviews/finclude.footer')
<script src="botstrap.js"></script>
</body>
<script>
   /*
 $(document).ready(function(){
$('.addtocart').click(function(e){
    e.preventDefault();
    var product_id =$(this).closest('.prodetails').find('.pro_id').val();
    var product_qty =$(this).closest('.prodetails').find('.qty-input').val();
    //alert(product_id);
    //alert(product_qty);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method:"POST",
        url:"/addprotocart",
        data:{
            'product_id':product_id,
            'product_qty':product_qty,
        },
        success: function(response){
            alert(response.statuse);

        }
    });
});
    
});


   */
</script>
</html>