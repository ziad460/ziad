@extends('layouts.app')
@section('content')
<html>
<head>
    <title>hello admin</title>
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
        <li><a href="{{ URL::to('product/create') }}">insertproduct</a>
    </ul>
</nav>

<h1>All the products</h1>
<br/>
<form method="post" action="{{url('product/search')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="text" name="n" value="">
                <input type="submit" class="btn btn-warning" value="search"/>
                 
             </form>
             <br/>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
      <tr>
            <th>ID</th>
            <th>Name </th>
             <th>image</th>
              <th>price</th>
               <th>quantity</th>
             <th>showthisbook</th>
             <th>showthisbookway</th>
             <th>Edit </th>
              <th>EditAgain </th>
           <th>delete </th>

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

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL('product',$value->id) }}">Show this product</a>
            </td>
<td>
                <form method="post" action="{{url('product/show')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="hidden" name="id" value="{{$value->id}}">
                <input type="submit" class="btn btn-warning" value="showproduct"/>
                 
             </form>
         </td>
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
               <td> <a class="btn btn-small btn-info" href="{{ URL('product/' . $value->id . '/edit') }}">edit this product</a>
                </td>
                <td>
              <form method="post" action="{{url('product/edit')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="hidden" name="id" value="{{$value->id}}">
                <input type="submit" class="btn btn-warning" value="EditAnotherAway"/>
                 
             </form>      
                </td>
                <td>
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
             <form method="post" action="{{url('product/delete')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <input type="hidden" name="id" value="{{$value->id}}">
                <input type="submit" class="btn btn-warning" value="Deletethisproduct"/>
                 
             </form>
              

            </td>

        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
