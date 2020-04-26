@extends('layouts.app')
@section('content')
<html>
<head>
    <title>Look! I'm CRUDding</title>
      <link rel="stylesheet" href="asset{{'bootstrap.css'}}">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL('userHome') }}">products</a>
    </div>
</nav>

<!-- will be used to show any messages -->


<table class="table table-striped table-bordered">
    <thead>
      <tr>
            <th>ID</th>
            <th>Name </th>
             <th>image</th>
             <th>price</th>
             
          </tr> 
            
      
    </thead>
    <tbody>
        @foreach($mycart as  $value)
        <tr>
            <td>{{ $value->id}}</td>
            <td>{{ $value->name }}</td>
            <td><img height="200px" width="200px" src="{{asset('uploads/images/'.$value->image)}}"/></td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>{{ $value->price }}</td>
            <td>


            <!-- we will also add show, edit, and delete buttons -->
            
        </tr>
        @endforeach
  
    </tbody>
</table>

</div>
</body>
</html>