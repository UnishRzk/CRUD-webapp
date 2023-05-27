<!-- =============== LOGIN PAGE ================ -->

<!DOCTYPE html>
<html>

<head>
	<title>Student Vault | Login</title>
	<link rel="stylesheet" href="login.css">
</head>

<body>

	<?php
	session_start();

	include("connection.php");
	include("functions.php");


	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if ($result) {
				if ($result && mysqli_num_rows($result) > 0) {

					$user_data = mysqli_fetch_assoc($result);

					if ($user_data['password'] === $password) {

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}

			echo "<script>alert('Wrong Username or Password')</script>";
		} else {
			echo "<script>alert('Wrong Username or Password')</script>";
		}
	}

	?>

	<div class="container">
		<form method="post">
			<div class="contact-box">
				<div class="left"></div>
				<div class="right">
					<h2>Login</h2>
					<input id="text" class="field" type="text" placeholder="Enter Username" name="user_name" required on
						invalid="this.setCustomValidity('Enter your Username')" on input="this.setCustomValidity('')">
					<input id="text" class="field" type="password" placeholder="Enter Password" name="password" required
						on invalid="this.setCustomValidity('Enter your Password')" on
						input="this.setCustomValidity('')">
					<input id="button" class="btn" type="submit" value="Login"><br>
				</div>
				<a href="signup.php" class="field">Not a Member?</a>
			</div>
		</form>
	</div>
</body>

</html>