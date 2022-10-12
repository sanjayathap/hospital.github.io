<?php
include '../confg.php';


   

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $date = mysqli_real_escape_string($conn, $_POST['date']);
   $sub = mysqli_real_escape_string($conn, $_POST['subject']);
   $messa = mysqli_real_escape_string($conn, $_POST['message']);

  
         $insert = "INSERT INTO contact(username, email,phone, address ,date,subject,message password) 
         VALUES('$name','$email','$phone','$address','$date','$gender','$sub','$messa')";
         $result=mysqli_query($conn, $insert);
         if($result){
            $to="sandeshthapa2415@gmail.com";
            $subject="$sub, $name,$phone,$address";
            $body="Dear $name thank you for contacting us...";
            $message="$messa";
            $from="$email";
            $headers="From : $from";
            mail($to,$subject,$message,$headers);
             echo "<script>alert('Thank you for contacting us.)</script>";
        header("Location:index1.php");
      }else{
        echo" sorry disconnecting ";
      }
         }
        

?>