@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p>Please fill up to this form.....</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping details</p>
							<div class="form-one">
								<form  action="{{URL('/save-shipping')}}" method="post">
									{{csrf_field()}}
									<input type="text" name="shipping_email" placeholder="Email*" required="">
									
									<input type="text" name="shipping_name" placeholder="Name *"  required="">
									<input type="text" name="shipping_address" placeholder="Address  *"  required="">
									<input type="text" name="shipping_city" placeholder="city  *"  required="">
									<input type="submit" class="btn btn-default" value="Done"  required="">
									
								</form>
							</div>
							
						</div>
					</div>			
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection