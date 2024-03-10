<?php

@include 'config.php';

session_start();

$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="admin_style.css">


</head>
<body>

<?php @include 'admin_header.php'; ?>

<section class="add-products">

    <form action="" method="POST" enctype="multipart/form-data">
        <h3>add new product</h3>
        <input type="text" class="box" required placeholder="enter product name" name = "name">
        <input type="price" class="box" required placeholder="enter product price" name = "price">
        <textarea name="details" class="box" required placeholder="enter product details" cols="30" rows="10"></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
        <input type="submit" value="add product" name="add_product" class="btn">
    </form>

</section>




<script src="admin_script.js"></script>
    
</body>
</html>