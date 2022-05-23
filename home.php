<?php
	session_start();
	include("connect.php");
	if (isset($_SESSION['username']) && isset($_SESSION['id'])) 
		{ ?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<title>HomePage</title>
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center" 
		style="height: 100vh;">
			<?php if ($_SESSION['role'] == 'admin') { ?>
			
			<div class="card" style="width: 18rem;">
			  <img src="img/admin.png" 
			  		class="card-img-top" 
			  		alt="admin image">
			  <div class="card-body">
			    <h5 class="card-title">Welcome <?php echo $_SESSION['name']?></h5>
			    <a href="logout.php" class="btn btn-dark">Logout!</a>
			  </div>
			</div>

			<div class="p-3"  style="width: 50%;">
				<?php include("func/members.php");
						if (mysqli_num_rows($res) > 0) {?>

				<h2>Members</h2>
				<table class="table text-center">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">user name</th>
				      <th scope="col">name</th>
				      <th scope="col">role</th>
				    </tr>
				  </thead>

				  <?php 
				  $i = 1;
				  while ($rows = mysqli_fetch_assoc($res)) {?>
				
				  
				  <tbody>
				    <tr>
				      <th scope="row"><?= $i ?></th>
				      <td><?= $rows['username']?></td>
				      <td><?= $rows['name']?></td>
				      <td><?= $rows['role']?></td>
				    </tr>
				    <?php $i++; } ?>
				  </tbody>
				</table>
			<?php } ?>
			</div>
		<?php }else  { ?>
				<div class="card" style="width: 18rem;">
			  <img src="img/user.png" 
			  		class="card-img-top" 
			  		alt="user image">
			  <div class="card-body">
			    <h5 class="card-title">Welcome <?php echo $_SESSION['name']?></h5>
			    <a href="logout.php" class="btn btn-dark">Logout!</a>
			  </div>
			</div>
		<?php } ?> 
	</div>
</body>
</html>

<?php 
	}else {
			header("location: index.php");
	}
?>