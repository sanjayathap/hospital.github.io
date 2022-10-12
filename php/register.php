<?php 

include '../php/confg.php';

// error_reporting(0);

// session_start();

if (isset($_SESSION['username'])) {
    header("Location: index1.php");
}

if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$gend = mysqli_real_escape_string($conn, $_POST['gender']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM hospital WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0 ) {			
// 			$email_error = "Sorry... email already taken";  
// 		}
// 		else{
// 		  $query = mysqli_query($conn, "INSERT INTO hospitals('name','address','city','gender','email','password')
// 		  VALUES ('$username', '$address',' $city','$gender','$email' ,'$password')");
// 		  echo  "<script>alert('Wow! User Registration Completed.')</script>";
// 		}
// 	}
// }

			$sql="INSERT INTO hospitals('username','address','city','gender','email','password')
			VALUES ('$username', '$address',' $city','$gend','$email' ,'$password')";
			$result = mysqli_query($conn, $sql);
		if ($result) 
			{
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$insert = "INSERT INTO sandesh(username, address,city,gender, email, password, user_type) 
				VALUES('$name','$address','$city','$gender','$email','$pass','$user_type')";
				mysqli_query($conn, $insert);
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/register.css">

	<title>Register Form </title>
</head>
<body onload='document.form1.text1.focus()'>
	<div class="container">
		<form name="registration" id="registration"  method="post">
            <p class="hello" >Register</p>
			<div class="contain">
				<input type="text" placeholder="Username" name="username" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$"  title="Username should only contain lowercase letters" required>
			</div>
            <div class="contain">
            <input type="text"  name="address" placeholder="Address"   required>
			</div>
            <div class="contain">
				<input  type="text" name="city" placeholder="City"  required>
			</div>
            <div class="contain">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
			<div class="contain">
				<input type="email" name="email" id="email" onBlur="userAvailability()"  placeholder="Email"  required>
			</div>
			<div class="contain">
				<input type="password" placeholder="Password" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="contain">
				<input type="password" placeholder="Confirm Password" name="cpassword" id="password2"  required>
			</div>
            <div class="contain">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
			<div class="contain">
            <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
			</div>
			<p class="container2">Have an account? <a href="../php/index1.php">Login Here</a>.</p>
		</form>
	</div> 
</body>
	<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			})
		</script>

</html>