<?php

@include 'config.php';

session_start();

$user_id =  $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    
<?php @include 'header.php';?>

<section class="section heading">
    <h3>contact us</h3>
    <p> <a href="home.php">home</a> / contact</p>
</section>

<section class="contact">

    <form action="" method="POST">

        <h3>got any questions for us?</h3>

        <input type="text" name="name" placeholder="enter your name" class="box" required>
        <input type="email" name="email" placeholder="enter your email" class="box" required>
        <input type="number" name="number" placeholder="enter your number" class="box" required>
       
        <div class="box">
            <label for="country">Country:</label>
            <input value="<?= $country ?>" type="text" id="country" name="country" placeholder="enter your country">
        </div>

        <div class="box">
            <label for="county">County:</label>
                <select id="county" name="county" disabled>
                    <option value="<?= $county ?>">select county</option>
                </select>
        </div>
        <textarea name="message" class="box" placeholder="enter your message" required cols="30" rows="10"></textarea>
        <input type="submit" value="send message" name="send" class="btn">
    </form>

</div>


<?php @include 'footer.php';?>
<script src="script.js"></script>

</body>
</html>