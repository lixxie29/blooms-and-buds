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
    <title>about</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php @include 'header.php';?>


<section class="section heading">
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about</p>
</section>

<section class="about">
    <div class="flex">
        <div class="image">
            <img src="images/about-img1.jpg" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>At Blooms & Buds, we believe 
                in the power of flowers to brighten your day, elevate your space, and create 
                unforgettable moments. Our handcrafted bouquets are carefully curated by our 
                team of expert florists, using only the freshest, highest quality blooms sourced 
                from local growers and sustainable farms.</p>
                <a href="shop.php" class="btn">shop our products</a>
        </div>
    </div>

    <div class="flex">
        <div class="content">
            <h3>what do we offer?</h3>
            <p>At Blooms & Buds, we believe 
                in the power of flowers to brighten your day, elevate your space, and create 
                unforgettable moments. Our handcrafted bouquets are carefully curated by our 
                team of expert florists, using only the freshest, highest quality blooms sourced 
                from local growers and sustainable farms.</p>
                <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/about-img2.jpg" alt="">
        </div>
</div>

    <div class="flex">
        <div class="image">
            <img src="images/about-img3.jpg" alt="">
        </div>

        <div class="content">
            <h3>who we are</h3>
            <p>At Blooms & Buds, we believe 
                in the power of flowers to brighten your day, elevate your space, and create 
                unforgettable moments. Our handcrafted bouquets are carefully curated by our 
                team of expert florists, using only the freshest, highest quality blooms sourced 
                from local growers and sustainable farms.</p>
                <a href="#reviews" class="btn">client reviews</a>
        </div>
    </div>
</section>

<section class="reviews" id="reviews">

    <h1 class="title">client reviews</h1>

    <div class="box-container">
        <div class="box">
            <img src="images/pic1.jpg" alt="">
            <p>At Blooms & Buds, we believe 
            in the power of flowers to brighten your day, elevate your space, and create 
            unforgettable moments.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/pic2.jpg" alt="">
            <p>At Blooms & Buds, we believe 
            in the power of flowers to brighten your day, elevate your space, and create 
            unforgettable moments.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/pic3.jpg" alt="">
            <p>At Blooms & Buds, we believe 
            in the power of flowers to brighten your day, elevate your space, and create 
            unforgettable moments.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/pic4.jpg" alt="">
            <p>At Blooms & Buds, we believe 
            in the power of flowers to brighten your day, elevate your space, and create 
            unforgettable moments.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
        </div>

    </div>

</section>




<?php @include 'footer.php';?>
<script src="script.js"></script>

</body>
</html>