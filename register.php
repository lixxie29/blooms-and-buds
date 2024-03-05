<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<section class="form-container">
    <form action="" method="post">
        <h3>Register now</h3>
        <input type="text" name="name" class="box" placeholder="enter your username" required>
        <input type="email" name="email" class="box" placeholder="enter your email" required>
        <input type="password" name="password" class="box" placeholder="enter your password" required>
        <input type="password" name="cpassword" class="box" placeholder="confirm your password" required>
        <input type="submit" class="button" name="submit" value="register">
        <p>already registered? <a href="login.php">login now</a></p>
    </form>
</section>

</body>
</html>