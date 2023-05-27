<!-- ================== SIGNUP PAGE =================== -->

<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	if (!empty($email) && ($user_name) && !empty($password) && !is_numeric($user_name)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password,email) values ('$user_id','$user_name','$password','$email')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Student Vault | Signup</title>
	<link rel="stylesheet" href="login.css">
</head>

<body>
	<div class="container">
		<form method="post">
			<div class="contact-box">
				<div class="contact-box">
					<div class="left"></div>
					<div class="right">
						<h2>Sign-up</h2>
						<input id="text" class="field" type="email" placeholder="Enter your Email" name="email" required
							on invalid="this.setCustomValidity('Enter your Email')" on
							input="this.setCustomValidity('')">
						<input id="text" class="field" type="text" placeholder="Enter Username" name="user_name"
							required on invalid="this.setCustomValidity('Enter your Username')" on
							input="this.setCustomValidity('')">
						<input id="text" class="field" type="password" placeholder="Enter Password" name="password"
							required on invalid="this.setCustomValidity('Enter your Password')" on
							input="this.setCustomValidity('')">
						<input id="button" class="btn" type="submit" value="Signup"><br>
					</div>
					<a href="Login.php" class="field">Already have a account?</a>
				</div>
			</div>
		</form>
	</div>
</body>

</html>