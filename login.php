<?php

@include 'config.php';
session_start();


if(isset($_POST['submit'])){

    //these two lines are important because they provide more security for the form(aka makes sure user input is safe from xss attacks and sql injection)
    //this removes any HTML tags and special characters that are not alphanumeric, and it is used to help prevent cross-site scripting (XSS) attacks

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);  
    $password = mysqli_real_escape_string($conn, md5($filter_password));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        
        $row = mysqli_fetch_assoc($select_users);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');

        }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');

        }

    }else{
        $message[] = 'incorrect credentials!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

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

    
<!-- <section class="form-container">
    <form action="" method="post">
        <h3>Login</h3>
        <input type="email" name="email" class="box" placeholder="enter your email" required>
        <input type="password" name="password" class="box" placeholder="enter your password" required>
        <input type="submit" class="btn" name="submit" value="login">
        <p>don't have an account? <a href="register.php">register now</a></p>
    </form>
</section> -->

<section class="form-container">
    <form id="loginForm" action="" method="post" onsubmit="return validateLoginForm()">
        <h3>Login</h3>
        <input type="email" id="email" name="email" class="box" placeholder="enter your email">
        <span id="emailError" class="error-message"></span>
        <input type="password" id="password" name="password" class="box" placeholder="enter your password">
        <span id="passwordError" class="error-message"></span>
        <input type="submit" class="btn" name="submit" value="login">
        <p>Don't have an account? <a href="register.php">Register now</a></p>
    </form>
</section>

<script src="login_validation.js"></script>

</body>
</html>