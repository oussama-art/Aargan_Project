<?php

include 'config.php';

session_start();



if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="images/admin.png" type="image/x-icon">
   <title>Admin Products</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   
   

</head>
<body>
   
<?php include 'admin_header.php'; ?>



<section class="add-products" id="add-product-section">
    <h1 class="title">Shop Products</h1>
    <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    <form action="" method="post" enctype="multipart/form-data">
        <h3>Add Product</h3>
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" name="name" class="form-control" id="productName" placeholder="Enter product name" required>
        </div>

        <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="number" min="0" name="price" class="form-control" id="productPrice" placeholder="Enter product price" required>
        </div>

        <div class="form-group">
            <label for="productImage">Product Image</label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="form-control-file" id="productImage" required>
        </div>

        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
    </form>
</section>


<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data" id="update-form">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <button type="button" id="cancel-update" class="option-btn">Cancel</button>
   </form>
   <?php
         }
      }
      echo '<script>document.getElementById("add-product-section").style.display = "none";</script>';
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>

<section class="show-products">
   <div class="container">
      <div class="row">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
         <div class="col-md-4 mb-4">
            <div class="card">
               <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="card-img-top" alt="<?php echo $fetch_products['name']; ?>">
               <div class="card-body">
                  <h5 class="card-title"><?php echo $fetch_products['name']; ?></h5>
                  <p class="card-text">$<?php echo $fetch_products['price']; ?>/-</p>
                  <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="btn btn-primary">Update</a>
                  <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="btn btn-danger" onclick="return confirm('Delete this product?');">Delete</a>
               </div>
            </div>
         </div>
         <?php
            }
         } else {
            echo '<p class="empty col-12 text-center">No products added yet!</p>';
         }
         ?>
      </div>
   </div>
</section>










<!-- custom admin js file link  -->
<script src="js/script.js"></script>
<script>
   document.getElementById('cancel-update').addEventListener('click', function() {
      // Redirect or perform any other action when cancel is clicked
      window.location.href = 'admin_products.php';
   });
</script>
<script>
    // Add an event listener to the "Update Product" form
    document.getElementById('update-form').addEventListener('submit', function() {
        // Show the "Add Product" form when the "Update Product" form is submitted
        document.getElementById("add-product-section").style.display = "block";
    });
</script>


</body>
</html>
<style>
   .add-products {
    margin: 20px;
}

.title {
    text-align: center;
}

form {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
    border-radius: 8px;
}

h3 {
    text-align: center;
    margin-bottom: 20px;
}

/* Additional styling for form controls */
.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.form-control-file {
    display: block;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}
/* Custom styling for the submit button */

.edit-product-form {
    margin: 20px;
}

.edit-product-form form {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
    border-radius: 8px;
}

.edit-product-form img {
    display: block;
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.edit-product-form .box {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

.edit-product-form .btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.edit-product-form .btn:hover {
    background-color: #0056b3;
}

.edit-product-form #close-update {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #ccc;
    color: #333;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.edit-product-form #close-update:hover {
    background-color: #bbb;
}

   /* ... Previous styles ... */

   .option-btn {
       display: block;
       width: 100%;
       padding: 10px;
       background-color: #ccc;
       color: #333;
       border: none;
       cursor: pointer;
       border-radius: 4px;
       margin-top: 10px; /* Add margin for spacing */
   }

   .option-btn:hover {
       background-color: #bbb;
   }

</style>

