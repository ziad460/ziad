@extends('admin_layout')
@section('admin_content')

	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">order details</a></li>
			</ul>
			<p class="alert-success">
						<?php
						$message=Session::get('message');
						if($message)
						{
							echo $message;
							Session::put('message',null);
						}
						?>
					</p>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>order id</th>
								  <th>customer name</th>
								  <th>order total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						  @foreach($all_order_info as $v_order) 
						  <tbody>
							<tr>
								<td>{{$v_order->order_id}}</td>
								<td class="center">{{$v_order->customer_name}}</td>
								<td class="center">{{$v_order->order_total}}</td>
								<td class="center">{{$v_order->order_status}}</td>
							</tr>
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection