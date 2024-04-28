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
    <title>update product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">
    
   <!-- include the JavaScript validation file -->
   <script src="admin_script.js"></script>


</head>
<body>

<?php @include 'admin_header.php'; ?>

<section class="update-product">



<?php

    $update_id = $_GET['update'];
    $select_products = mysqli_query($conn,"SELECT * FROM 'products' WHERE id = '$update_id'") or die('query failed');
    if(mysqli_num_rows($select_products) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_products)){
?>

<form action="" method="post" enctype="multipart/form-data">
    <img src="uploaded_image/<?php echo $fetch_products['image'];?>" class="image" alt="">
    <input type="text" class="box" value="<?php echo $fetch_products['name'];?>" required placeholder="enter product name" name="name">
    <input type="price" class="box" value="<?php echo $fetch_products['price'];?>" required placeholder="enter product price" name = "price">
    <textarea name="details" class="box" required placeholder="enter product details" cols="30" rows="10"><?php echo $fetch_products['details'];?></textarea>
    <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
    <input type="submit" value="update product" name="update_product" class="btn">
    <a href="admin_products.php" class="option-btn">go back?</a>
</form> 

<?php
        }
    }else{
        echo '<p class="empty">no update product selected</p>';
    }
?>

</section>


<footer>
   <p>&copy; 2024 Blooms & Buds Website. All rights reserved.</p>
</footer>
    
</body>
</html>