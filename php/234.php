<?php

include '../php/confg.php';


   

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM sandesh WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 1){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO sandesh(username, address,city,gender, email, password, user_type) 
         VALUES('$name','$address','$city','$gender','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         echo "<script>alert('Wow! User Registration Completed.)</script>";
        header("Location:index1.php");
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/123.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username"  pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" required placeholder="enter your name">
     
      <input type="text" name="address" required placeholder="enter your address">
      <input type="text" name="city" required placeholder="enter your city">
      Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
 <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      <input type="password" name="cpassword" required placeholder="confirm your password">

      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>