<?php 
	session_start();
	if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) 
		{ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<title>Multi role system</title>
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center" 
		style="height: 100vh;">

		<form class="border shadow p-3 rounded" 
				style="width: 450px;"
				action="func/check-role.php"
				method="post">

			<h1 class="text-center p-3">Login</h1>

				<?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger" role="alert">
					<?= $_GET['error'] ?>
			</div>
				<?php } ?>

		  <div class="mb-3">
		    <label for="username" class="form-label">User Name</label>
		    <input 	type="text"
		    		name="username" 
		    		class="form-control" 
		    		id="username" 
		    		placeholder="Username">
		  </div>

		  <div class="mb-3">
		    <label for="password" class="form-label">Password</label>
		    <input 	type="password" 
		    		name="password"
		    		class="form-control" 
		    		id="Password" 
		    		placeholder="Password">
		  </div>

		  <div	class="mb-1">
		  	<label class="form-label">Select user role:</label>
		  </div>
			 	<select class="form-select" 
			 			name="role" 
			  			aria-label="Default select">
				  <option selected value="user">User</option>
				  <option value="admin">Admin</option>
				</select>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>
<?php 	}else {
			header("location: home.php");
	}
?> 