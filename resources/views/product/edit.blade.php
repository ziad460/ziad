@extends('layouts.app')
@section('content')
<html>
<head>
    <title>Look!</title>
       <link rel="stylesheet" href="asset{{'bootstrap.css'}}">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL('product') }}">books</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL('product') }}">View All product</a></li>
        <li><a href="{{ URL('product/create') }}">insert</a>
    </ul>
</nav>

<h1>insert a product</h1>

<!-- if there are creation errors, they will show here -->

<form action="{{url('product/update')}}" method="post" enctype="multipart/form-data"/>
            <input type="hidden" name="_token" value="{{ csrf_token()}}">


    <div class="form-group">
        <input type="text" name="pname" value="{{$products->name}}" class="form-control" placeholder="productName" />
    </div>
    <div class="form-group">
    <input type="file" name="image" class="form-control" value="{{$products->image}}"/>
 
    </div>

    <div class="form-group">
    <input type="text" name="pprice" class="form-control" value="{{$products->price}}" placeholder="price" />
 
    </div>
    <div class="form-group">
    <input type="text" name="pqty" class="form-control" value="{{$products->qty}}" placeholder="quantity" />     
 
    </div>
    
    <input type="hidden" name="id" value="{{$products->id}}">

    <input type="submit" name="" value="Save">


</form>
</div>
</body>
</html>