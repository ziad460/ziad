@extends('admin_layout')
@section('admin_content')
	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add product</h2>
						
					</div>
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
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">slider image </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" name="slider_image" type="file" required="">
							  </div>
							</div>     
							
							

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1" required="">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection