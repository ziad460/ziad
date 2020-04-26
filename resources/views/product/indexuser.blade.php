@extends('layouts.app')
@section('content')
<html>
<head>
    <title>Home</title>
      <link rel="stylesheet" href="asset{{'bootstrap.css'}}">
      <style type="text/css">
        .p{
          width:230px;  padding:10px; background:#DDD; border:5px solid black;
         margin:10px 10px; float:left;
        }
        .x{
          margin:10px 10px;
          display:inline;
        }
        .b{
          border:2px solid blue;
          background:green;
          color:white;
        }
      </style>
</head>
<body>
<div class="container">
<h1>All the products</h1>
<br/>
<form method="post" action="{{url('product/searchuser')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="text" name="n" value="">
                <input type="submit" class="btn btn-warning" value="search"/>
                 
             </form>

            <form method="post" action="{{url('product/viwecarthistory')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input type="hidden" name="u_id" value="{{Auth::user()->id}}">

                <input type="submit" class="b" value="view_mycart_history"/>
                 
             </form>
            
             <br/>
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    @foreach($products as  $value)
        <div class="p">
            <h3 align="center">{{ $value->name }}</h3>
            <br/>
            <img height="200px" width="200px" src="{{asset('uploads/images/'.$value->image)}}"/>
            <!-- we will also add show, edit, and delete buttons -->
           price:<p class="x">{{ $value->price }} $</p> 
           quantity:<p class="x">{{ $value->qty }}</p>
            <form method="post" action="{{url('product/showuser')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="hidden" name="id" value="{{$value->id}}">
                <input type="submit" class="btn btn-warning" value="showproduct"/>
                 
             </form>
             <form method="post" action="{{url('product/addtocart')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="hidden" name="u_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="p_id" value="{{$value->id}}">
                <input type="submit" class="b" value="add_to_cart"/>
                 
             </form>
        </div>

                  <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
    @endforeach
  

</div>
</body>
</html>
