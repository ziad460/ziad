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
        <a class="navbar-brand" href="{{ URL('product') }}">products</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL('product') }}">View All products</a></li>
        <li><a href="{{ URL('product/create') }}">insert</a>
    </ul>
</nav>

<h1>insert a product</h1>

<!-- if there are creation errors, they will show here -->

<form action="{{url('product/store')}}" method="post" enctype="multipart/form-data" />
            <input type="hidden" name="_token" value="{{ csrf_token()}}">


    <div class="form-group">
        <input type="text" name="pname" class="form-control" placeholder="productName" />
    </div>
    <br/>
     <input type="file" name="image"  />

    <div class="form-group">
    <input type="text" name="pprice" class="form-control" placeholder="price" />
    </div>
 
   <div class="form-group">
    <input type="text" name="pqty" class="form-control" placeholder="quantity" />
    </div>
 

    <input type="submit" name="" value="Save">


</form>
</div>
</body>
</html>