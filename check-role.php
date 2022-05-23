<?php
session_start();
include '../connect.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
	
	function validate($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

			return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$role	  = validate($_POST['role']);

	if (empty($username)) {
		header("location: ../index.php?error=User name is requierd");
	} elseif (empty($password)) {
		header("location: ../index.php?error=Password is requierd");
	} else {
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] === $password && $row['role'] == $role) {

				$_SESSION['name'] 		= $row['name'];
				$_SESSION['username'] 	= $row['username'];
				$_SESSION['role'] 		= $row['role'];
				$_SESSION['id'] 		= $row['id'];

				header("location: ../home.php");
			}else {
			header("location: ../index.php?error=Incorect Username or Passowrd");
			}
		}else {
			header("location: ../index.php?error=Incorect Username or Passowrd");
		}
	}
}else {
	header("location: ../index.php");
}