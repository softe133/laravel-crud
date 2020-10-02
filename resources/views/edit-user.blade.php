<!DOCTYPE html>
<html>
<head>
	<title>Edit Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

	<section style="padding-top:60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							Edit User
						</div>
						<div class="card-body">
							@if(Session::has('user-updated'))
								<div class="alert alert-success" role="alert">
									{{Session::get('user-updated')}}
								</div>
							@endif
							<form method="POST" action="{{route('user.update')}}">
								@csrf
								<input type="hidden" name="id" value="{{$userinfo->id}}">
							    <div class="form-group">
							    	<label for="full_name">Full name</label>
							    	<input type="text" name="full_name" class="form-control" placeholder="Enter Full name" value="{{$userinfo->full_name}}">
                                </div>
                                <div class="form-group">
							    	<label for="father_name">Father name</label>
							    	<input type="text" name="father_name" class="form-control" placeholder="Enter Father name" value="{{$userinfo->father_name}}">
                                </div>
                                <div class="form-group">
							    	<label for="cnic">Cnic no</label>
							    	<input type="number" name="cnic" class="form-control" placeholder="Enter cnic" value="{{$userinfo->cnic}}">
                                </div>
                                <div class="form-group">
							    	<label for="email">Email</label>
							    	<input type="text" name="email" class="form-control" placeholder="Enter email" value="{{$userinfo->email}}">
                                </div>
                                <div class="form-group">
							    	<label for="contact">Contact no</label>
							    	<input type="number" name="contact" class="form-control" placeholder="Enter contact no" value="{{$userinfo->contact_no}}">
                                </div>
                                <div class="form-group">
							    	<label for="address">Permanent Address</label>
							    	<input type="text" name="address" class="form-control" placeholder="Enter address" value="{{$userinfo->address}}">
                                </div>
                                <div class="form-group">
							    	<label for="password">Password</label>
							    	<input type="password" name="password" class="form-control" placeholder="Enter password" value="{{$userinfo->password}}">
                                </div>
                                <button type="submit" class="btn btn-success">Update User</button>

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		
	</section>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>
</html>