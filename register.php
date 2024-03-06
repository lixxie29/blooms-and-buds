<?php

@include 'config.php';

if(isset($_POST['submit'])){

    //these two lines are important because they provide more security for the form(aka makes sure user input is safe from xss attacks and sql injection)
    //this removes any HTML tags and special characters that are not alphanumeric, and it is used to help prevent cross-site scripting (XSS) attacks

    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);  
    $name = mysqli_real_escape_string($conn, $filter_name);
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);  
    $password = mysqli_real_escape_string($conn, md5($filter_password));
    $filter_cpassword = filter_var($_POST['cpassword'],FILTER_SANITIZE_STRING);  
    $cpassword = mysqli_real_escape_string($conn, md5($filter_cpassword));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'user already exists!';
    }
    else{
        if($password != $cpassword){
            $message[] = 'passwords do not match';
        }else{
        mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$password')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>


<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    
<section class="form-container">
    <form action="" method="post">
        <h3>Register Account</h3>
        <input type="text" name="name" class="box" placeholder="enter your username" required>
        <input type="email" name="email" class="box" placeholder="enter your email" required>
        <input type="password" name="password" class="box" placeholder="enter your password" required>
        <input type="password" name="cpassword" class="box" placeholder="confirm your password" required>
        <input type="submit" class="btn" name="submit" value="register">
        <p>already registered? <a href="login.php">login now</a></p>
    </form>
</section>

</body>
</html>