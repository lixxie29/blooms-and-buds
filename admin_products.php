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
    $image = $_FILES['image'];
    // $image_size = $_FILES['image']['size'];
    // $image_tmp_name = $_FILES['image']['tmp_name'];
    // $image_folder = "/project/Flower-Store-Website/uploaded_img".$image;

    $select_product_name_query = "SELECT name FROM `products` WHERE name = '$name'";
    $select_product_name = mysqli_query($conn, $select_product_name_query) or die('query failed');


    if(mysqli_num_rows($select_product_name) > 0)
    {
        $message[] = 'product name already exists';
    }
    else {
        $insert_product_query = "INSERT INTO `products` (name, details, price, image) VALUES ('$name', '$details', '$price', '$image')";
        $insert_product = mysqli_query($conn, $insert_product_query) or die('query failed');

            if($insert_product) {
            // if($image_size > 2000000) {
            //     $message[] = 'image size is too large';
            // } else{
            //     move_uploaded_file($_FILES["image"]["tmp_name"], $image_folder);
            //     $message[] = 'product added successfully';
            // }

            $time = time(); //used to make each image
            $image_name = $time . $image['name'];
            $image_tmp_name = $image['tmp_name'];
            $image_destination_path = '/project/Flower-Store-Website/images' . $image_name;

            //make sure file is image

            $allowed_files = ['png', 'jpg', 'jpeg'];
            $image_extension = explode('.', $image_name);
            $image_extension = end($image_extension);
            if (in_array($image_extension, $allowed_files)) {
                //proceed to check size
                if ($image['size'] < 2000000) {
                    //upload the image
                    move_uploaded_file($image_tmp_name, $image_destination_path);
                    $message[] = 'product added successfully';
                }
            }
            else {$message[] = 'image size is too large';}
        }
    }    
 }

 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id' ") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);

    if (!empty($fetch_delete_image['image'])) {
        unlink("images/".$fetch_delete_image['image']);
    }
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
    mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
    header('location:admin_products.php');
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

    <form method="POST" enctype="multipart/form-data">
        <h3>add new product</h3>
        <input type="text" class="box" required placeholder="enter product name" name="name">
        <input type="price" class="box" required placeholder="enter product price" name = "price">
        <textarea name="details" class="box" required placeholder="enter product details" cols="30" rows="10"></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
        <input type="submit" value="add product" name="add_product" class="btn">
    </form>

</section>

<section class="show-products">

    <div class="box-container">

        <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        
        
        <div class="box">
            <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
            <img class="image" src="images/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="details"><?php echo $fetch_products['details']; ?></div>
            <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
            <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
        </div>

            <?php
            }
        }
        ?>
    </div>

</section>

<script src="admin_script.js"></script>
    
</body>
</html>