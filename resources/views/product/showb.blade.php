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
        <li><a href="{{ URL::to('product/create') }}">insert product</a>
    </ul>
</nav>

<h1>All the books</h1>

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
        @foreach($products as  $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td><img height="200px" width="200px" src="{{asset('uploads/images/'.$value->image)}}"/></td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>{{ $value->price }}</td>
            <td>{{ $value->qty }}</td>
            <td>


            <!-- we will also add show, edit, and delete buttons -->
            
        </tr>
        @endforeach
  
    </tbody>
</table>

</div>
</body>
</html>
