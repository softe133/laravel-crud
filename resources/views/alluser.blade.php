<!DOCTYPE html>
<html>
<head>
	<title>All Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

	<section style="padding-top:60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							All User <a href="/laravel8_demo/public/add-user" class="btn btn-success">Add New User</a>
						</div>
						<div class="card-body">
							@if(Session::has('user-deleted'))
								<div class="alert alert-success" role="alert">
									{{Session::get('user-deleted')}}
								</div>
							@endif
							<table class="table table-stripped">
								<thead>
									<tr>
										<th>ID</th>
										<th>FULL NAME</th>
										<th>FATHER NAME</th>
										<th>CNIC</th>
										<th>EMAIL</th>
										<th>CONTACT NO</th>
										<th>ADDRESS</th>
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody>
									@foreach($userinfos as $userinfo)
										<tr>
											<td>{{$userinfo->id}}</td>
											<td>{{$userinfo->full_name}}</td>
											<td>{{$userinfo->father_name}}</td>
											<td>{{$userinfo->cnic}}</td>
											<td>{{$userinfo->email}}</td>
											<td>{{$userinfo->contact_no}}</td>
											<td>{{$userinfo->address}}</td>
											<td>
												<a href="/laravel8_demo/public/users/{{$userinfo->id}}" class="btn btn-info">Details</a>

												<a href="/laravel8_demo/public/edit-user/{{$userinfo->id}}" class="btn btn-success">Edit</a>

												<a href="/laravel8_demo/public/delete-user/{{$userinfo->id}}" class="btn btn-danger">Delete</a>


											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
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