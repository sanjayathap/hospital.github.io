<?php
include '../hospital/php/confg.php';
error_reporting(0);
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $date = mysqli_real_escape_string($conn, $_POST['date']);
   $sub = mysqli_real_escape_string($conn, $_POST['subject']);
   $messa = mysqli_real_escape_string($conn, $_POST['message']);
         $insert = "INSERT INTO contact(username, email ,phone, address ,date,subject,message) 
         VALUES('$name','$email','$phone','$address','$date','$sub','$messa')";
         $result=mysqli_query($conn, $insert);
         if($result){
            $to ="sandeshthapa2415@gmail.com";
            $subject ="$sub, $name,$phone,$address";
            $body ="Dear $name thank you for contacting us...";
            $message ="$messa";
            // $from ="";
            $header ='From:'.$email;
           if(mail($to,$subject,$message,$header)) {
             echo '<script>
			  alert("Thank you for contacting us.")
			 </script>';
        header("Location:php/index1.php");
      }else{
        echo' <script> alert("sorry disconnecting")</script> ';
      }
         }
		}
        

 ?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Contact us</title>
		<link href="../hospital/css/gallery.css" rel="stylesheet" type="text/css"  media="all" />
		<!-- <link rel="stylesheet" href="../hospital/css/contact.css"> -->

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!--start-wrap-->
			<!--start-header-->
			
			<div class="header">
				<div class="logo">
					<a href="index.html" style="font-size:25px;"><i class="fa fa-hospital-o" style="font-size:30px;color:white">
					</i>Risti Madhi Hospital Duipiple,Lamjung</a>
		         </div>
				<div class="top-nav" id="mySidenav">
					<ul>
					<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a></li>
						<li class="active"><a href="../hospital/php/index1.php">Home</a></li>
						<li><a href="../hospital/gallery.html">Gallery</a></li>
						<li><a href="../hospital/php/ticketbooking.php">Register</a></li>
						<li><a href="../hospital/contact.php">contact</a></li>
					</ul>
					<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>				
				</div>
				
				
			</div>
			
		
		</div>
			<div class="clear"> </div>
			<!-- <div class="wrap"> -->
		   	<div class="contact">
		   	<div class="section group">
				<div class="col span_1_of_3">

      			<div class="hospital-address">
				     	<h2>Hospital Address </h2>
				   		<p>Phone:<a href="tel:+977 9802844185">+977 9802844185</a></p>
				   		<p>Location: Duipiple,Lamjung ,Nepal</p>
				 	 	<p>Email: <span><a href=" mailto:mail@ristimadi.com.np">mail@ristimadi.com.np</a></span></p>
                        <p> find us on map:</p>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d879.9701219962104!2d84.23839249932084!3d28.0891881362569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995a13554b61d1f%3A0xd066a8c9109c3bfd!2sRisti%20Madi%20Hospital!5e0!3m2!1sen!2snp!4v1662998691141!5m2!1sen!2snp" 
							width="300" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				   </div>
				</div>
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input type="text" value="" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" name="username" required></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input type="text" value="" name="email" required></span>
						    </div>
						    <div>
						     	<span><label>Mobile.No</label></span>
						    	<span><input type="number" value="" name="phone" required></span>
						    </div>
							<div>
						     	<span><label>Address</label></span>
						    	<span><input type="text" value="" name="address" required></span>
						    </div>
							<div>
						     	<span><label>Date</label></span>
						    	<span><input type="date" value="" name="date" required></span>
						    </div>
							<div>
						     	<span><label>Subject</label></span>
						    	<span><input type="text" value="" name="subject" required></span>
						    </div>
						    <div>
						    	<span><label>message</label></span>
						    	<span><textarea name="message"> </textarea></span>
						    </div>
						<center>
						   <div>
						   		<span><input type="submit" value="Submit" name="submit"></span>
						  </div>
						</center>
					    </form>
				    </div>
  				</div>
			  </div>
			</div>

	</div>
	<footer>
		<div class="footer-box">
 		<h2>Services(facilities)</h2>
 		<a href="#">Medical Dressage</a>
 		<a href="#">Laboratory</a>
 		<a href="#">Vaccinations</a>
 		<a href="#">Whitening</a>
		 <a href="#">Emergency services(24 hour opening)</a>
 	</div>
 	<div class="footer-box">
 		<h2>About Us</h2>
 		<a href="#">Company Overview</a>
 		<a href="#">Management</a>
 		<a href="#">Initiatives</a>
 		<a href="#">Carrers</a>
 		<a href="#">Our Doctors Achieve</a>
 	</div>
 	<div class="footer-box">
 		<h2>Contact Us</h2>
 		<a href="tel:+977 9802844185">+977 9802844185</a>
 		<a href=" mailto:mail@ristimadi.com.np">mail@ristimadi.com.np</a>
 		<a href="#">Reach Hospitals</a>
 		<!-- <a href="#"><i class=" fa fa-fa facebook"></a> -->
 		<i class="fa fa-facebook-square" style="font-size:36px;color:rgb(0, 110, 255)"></i>
			<i class="fa fa-instagram" style="font-size:36px;color:rgb(252, 163, 31)"></i>
			<i class="fa fa-whatsapp" style="font-size:36px;color:rgb(59, 250, 52)"></i>
		
 	</div>
	
</footer>
<div class="footer1">
	<p class="hello">Risti Madhi Hospital Duipiple,Lamjung @2021</p>
</div>
<script>
function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
	document.getElementById("mySidenav").style.width= "0px";
	
  }
  </script>
	</body>
</html>
