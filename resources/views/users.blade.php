<!DOCTYPE html>
<html>
<head>
	<title>All Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<body>

	<section style="padding-top:60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="width: 100%;">
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
							<table id="userTable" class="table table-stripped display" data-page-length='10'>
								<thead>
									<tr>
										<th>ID</th>
										<th>NAME</th>
										<th>F-NAME</th>
										<th>CNIC</th>
										<th>EMAIL</th>
										<th>CONTACT</th>
										<th>ADDRESS</th>
										<th>ROLES</th>
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user as $userinfo)
										<tr>
											<td>{{$userinfo->id}}</td>
											<td>{{$userinfo->name}}</td>
											<td>{{$userinfo->father_name}}</td>
											<td>{{$userinfo->cnic}}</td>
											<td>{{$userinfo->email}}</td>
											<td>{{$userinfo->contact_no}}</td>
											<td>{{$userinfo->address}}</td>
											<td>{{$userinfo->title}}</td>
											<td>
												<a href="/laravel8_demo/public/single-users/{{$userinfo->id}}"><i class="fa fa-info" aria-hidden="true" title="details"></i></a>&nbsp;&nbsp;

												<a href="/laravel8_demo/public/edit-user/{{$userinfo->id}}" ><i class="fa fa-edit" title="edit"></i></a>&nbsp;

												<a href="/laravel8_demo/public/delete-user/{{$userinfo->id}}"><i class="fa fa-trash" title="delete"></i></a>

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

    <script>
    	$(document).ready( function () {
    		$('#userTable').DataTable();
		});
    </script>

</body>
</html>