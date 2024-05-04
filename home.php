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
    <title>home</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php @include 'header.php';?>

<section class="home">
    <div class="content">
        <h3>new collections</h3>
        <p>Your premier destination for exquisite artisanal 
            bouquets and delightful monthly subscription boxes. At Blooms & Buds, we believe 
            in the power of flowers to brighten your day, elevate your space, and create 
            unforgettable moments. Our handcrafted bouquets are carefully curated by our 
            team of expert florists, using only the freshest, highest quality blooms sourced 
            from local growers and sustainable farms.</p>
        <a href="about.php" class="btn">discover more</a>
    </div>
</section>




<?php @include 'footer.php';?>
<script src="script.js"></script>

</body>
</html>