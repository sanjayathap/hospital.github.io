<?php 

include 'confg.php';

// session_start();

// error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM sandesh WHERE email='$email' AND password='$pass'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location:index1.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}
// ".md5($_POST['password'])."
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/login.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="loginform">
		<div class="login">
      <img src="../images/download (4).jpeg"  class="hi">
		</div>
			<p class="hello"><span class="hello2">Log</span>in Page</p>
			<div class="contain">
				<input type="email" placeholder="Email" name="email"  required>
			</div>
			<div class="contain">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="contain">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="container2">Don't have an account? <a href="234.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>