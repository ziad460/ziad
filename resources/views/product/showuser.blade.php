@extends('layouts.app')
@section('content')
<html>
<head>
    <title>Look</title>
      <link rel="stylesheet" href="asset{{'bootstrap.css'}}">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL('userHome') }}">products</a>
    </div>
</nav>

<h1>All the products</h1>

<!-- will be used to show any messages -->


<table class="table table-striped table-bordered">
    <thead>
      <tr>
            <th>ID</th>
            <th>Name </th>
             <th>image</th>
             <th>price</th>
             <th>quantity</th>
             
          </tr> 
            
      
    </thead>
    <tbody>
        <tr>
            <td>{{ $products->id }}</td>
            <td>{{ $products->name }}</td>
            <td><img height="200px" width="200px" src="{{asset('uploads/images/'.$products->image)}}"/></td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>{{ $products->price }}</td>
            <td>{{ $products->qty }}</td>
            <td>

            

            <!-- we will also add show, edit, and delete buttons -->
            
        </tr>
  
    </tbody>
</table>

</div>
</body>
</html>
