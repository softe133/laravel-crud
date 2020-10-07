<!DOCTYPE html>
<html>
<head>
	<title>Add Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<body>

	<section style="padding-top:60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							Add User
						</div>
						<div class="card-body">
							@if(Session::has('user_created'))
								<div class="alert alert-success" role="alert">
									{{Session::get('user_created')}}
								</div>
							@endif
							<form  id="userAddForm">
								@csrf
							    <div class="form-group">
							    	<label for="name">Full name</label>
							    	<input type="text" name="name" class="form-control" placeholder="Enter Name" id="name">
                                </div>
                                <div class="form-group">
							    	<label for="father_name">Father name</label>
							    	<input type="text" name="father_name" class="form-control" placeholder="Enter Father name" id="father_name">
                                </div>
                                <div class="form-group">
							    	<label for="cnic">Cnic no</label>
							    	<input type="number" name="cnic" class="form-control" placeholder="Enter cnic" id="cnic">
                                </div>
                                <div class="form-group">
							    	<label for="email">Email</label>
							    	<input type="text" name="email" class="form-control" placeholder="Enter email" id="email">
                                </div>
                                <div class="form-group">
							    	<label for="contact_no">Contact no</label>
							    	<input type="number" name="contact_no" class="form-control" placeholder="Enter contact no" id="contact_no">
                                </div>
                                <div class="form-group">
							    	<label for="address">Permanent Address</label>
							    	<input type="text" name="address" class="form-control" placeholder="Enter address" id="address">
                                </div>
                                <div class="form-group">
							    	<label for="password">Password</label>
							    	<input type="password" name="password" class="form-control" placeholder="Enter password" id="password">
                                </div>
                                <div class="form-group">
                                <label for="roles">Select Roles :</label><br>
                                <label><input type="checkbox" name="roles[]" value="Administrator" class="get_value"> Administrator</label><br>
                                <label><input type="checkbox" name="roles[]" value="Editor" class="get_value"> Editor</label><br>
                                <label><input type="checkbox" name="roles[]" value="Subscriber" class="get_value"> Subscriber </label>
                                </div>  
                                <button type="submit" class="btn btn-success">Add User</button>

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		
	</section>

	<script>
		$("#userAddForm").submit(function(e){
			e.preventDefault();
			let name = $("#name").val();
			let fname = $("#father_name").val();
			let cnic = $("#cnic").val();
			let email = $("#email").val();
			let contact_no = $("#contact_no").val();
			let address = $("#address").val();
			let password = $("#password").val();
			let _token = $("input[name=_token]").val();
            var roles = [];  
            $('.get_value').each(function(){  
                 if($(this).is(":checked"))  
                 {  
                      roles.push($(this).val());  
                 }  
            });   
           roles = roles.toString();
			$.ajax({

				url: "{{route('user.create')}}",
				type:"POST",
				data:{
					name : name,
					father_name:fname,
					cnic:cnic,
					email:email,
					contact_no:contact_no,
					address:address,
					password:password,
					roles:roles,
					_token:_token

				},
				success:function(response)
				{
					if(response)
					{
						window.location.href = '/laravel8_demo/public/users';
					}
				}


			});

		});

		

		
		
	</script>

    
	


</body>
</html>