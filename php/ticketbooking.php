<?php 

include '../php/confg.php';

// error_reporting(0);

// session_start();

if (isset($_SESSION['username'])) {
    header("Location: index1.php");
}

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
     $phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$gend = mysqli_real_escape_string($conn, $_POST['gender']);
	$booking = mysqli_real_escape_string($conn, $_POST['book']);
    $insert = "INSERT INTO sandesh(username, email ,phone, address ,date,gender,book) 
    VALUES('$name','$email','$phone','$address','$date','$gend','$booking')";
    $result=mysqli_query($conn, $insert);
	echo "<script> window.alert('Thank you for contacting us.) </script>";
    if($result){
    //    $to ="sandeshthapa2415@gmail.com";
    //    $subject ="From: $name <$email>";
    //    $body ="Dear Name: $name\nEmail: $email\nPhone: $phone\naddress: $address\n\ndate:\n$date\n\ngender:\n$gend\n \n\nbook:\n$booking\nRegards,\n$name thank you for online booking for treatment...";

    //    $header ="From: $email";
    //   if(mail($to,$subject,$body,$header)) {
        echo "<script> window.alert('Thank you for contacting us.) </script>";
  
 }else{
   echo" Sorry, failed to send your message! ";
 }
  header("Location: index1.php");
    }
//    }

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
<body >
	<div class="container">
	<form name="RegForm"  action="#" onsubmit="return validateForm()"  method="post">
            <p class="hello" >Register</p>
			<div class="contain">
				<input type="text" placeholder="Username" id="name" name="name"  pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" title="Username should only contain lowercase letters" required>
                <b><span class="formerror"></span></b>
                <br>
			</div>
            <div class="contain">
				<input type="email" name="email" id="email"   placeholder="Email"  required>
                <b><span class="formerror"></span></b>
			</div>
            <div class="contain">
				<input type="number" name="phone" id="phone" pattern="/^\d{10}$/"  placeholder="phone number"  required>
                <b><span class="formerror"></span></b>
			</div>
            <div class="contain">
            <input type="text"  name="address" placeholder="Address" id="address"  required>
            <b><span class="formerror"></span></b>
			</div>
            <div class="contain">
				<input  type="date" name="date" placeholder="date of booking"  required>
			</div>
            <div class="hel">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-male">
										Male
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									
								</div>
							</div>
                            <div class="contain">
				<input type="text" name="book" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$"  title="Username should only contain lowercase letters for booking" placeholder="book you seat for treatment" id="book" required>
                <b><span class="formerror"></span></b>
			</div>
								<div class="hi">
									<label for="agree">
										I agree
									</label>
									<input type="checkbox" id="agree" value="agree">
									
								</div>
							
			<div class="contain">
            <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
			</div>
		
		</form>
	</div> 
</body>
<script src="../js/form.js"></script>
</html>