<?php

@include 'config.php';

session_start();

$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

 if(isset($_POST['add_product'])){

    // passing input through the mysqli_real_escape_string() function, any special characters that could be used to launch an SQL injection attack are neutralized, making the query safer and more secure.

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

    if(mysqli_num_rows($select_product_name) > 0)
    {
        $message[] = 'product name already exists';
    }
    else{
        $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, details, price, image) VALUES('$name', '$details', '$price', '$image')") or die('query failed');

        if($insert_product){
            if($image_size > 2000000){
                $message[] = 'image size is too large!';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'product added successfully!';
            }
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