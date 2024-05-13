<?php

include 'config.php';



$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['cart_id'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:index.php?page=cart');
}

if(isset($_POST['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php?page=cart');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="app/views/assets/images/image-nav/logo.ico" type="image/x-icon">
   <title>Shopping Cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <title>Professional Product Display</title>
   <style>
      /* Add any additional custom styles here */
      .product-card {
         margin-bottom: 20px;
      }
   </style>
   
</head>
<body>

<section>
               
   <h1 style="text-align:center;">Products Added</h1>
   <?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message" style="background-color: #f2f2f2; padding: 10px; margin: 10px; border: 1px solid #ddd;">
            <span>'.$message.'</span>
            <i class="fas fa-times" style="cursor: pointer;" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>


   <div class="row">
   <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="col-md-4 d-flex justify-content-center align-items-center">
         <div class="card product-card">
            
               <img src="admin2/uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="" class="card-img-top">
           
            <div class="card-body">
               <h5 class="card-title"><?php echo $fetch_cart['name']; ?></h5>
               <p class="card-text">$<?php echo $fetch_cart['price']; ?>/-</p>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="Update" class="btn btn-primary btn-sm">
                  <input type="submit" name="delete" value="delete" class="btn btn-primary btn-sm">
               </form>
               <p class="card-text">Sub Total: <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span></p>
            </div>
         </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p style="color:black;font-size:28px;margin-left:42%;">Your cart is empty</p>';
         
      }
      ?>
   </div>

   <div class="delete-all-container text-center">
      <form action="" method="post">
      <button  type="submit" class="btn btn-outline-primary" style=" background-color: #28a745; /* Set the primary button background color */
          border-color: #28a745;color:white" name="delete_all">Deletee All</button>
          

      </form>
   
   </div>

   <div class="grand-total-container">
      <p>Grand Total: <span>$<?php echo $grand_total; ?>/-</span></p>
      <div>
         <a href="index.php?page=blog2" class="btn btn-secondary">Continue Shopping</a>
         <a href="index.php?page=check" <?php echo ($grand_total > 1) ? '' : 'disabled'; ?> class="btn btn-success">Proceed to Checkout</a>
      </div>
   </div>
</section>

</body>
</html>
<style>
   body{
      overflow-x: hidden;
   }
   /* Center the content in the first div */
   .delete-all-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px; /* Adjust as needed */
      margin-right:5%;
   }

   /* Center the content in the second div */
   .grand-total-container {
      text-align: center;
   }
</style>

</style>









<?php include 'Footeer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
      /* Add any additional custom styles here */
      .product-card {
         margin-bottom: 20px;
      }
   </style>
   
<script>
   let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}
</script>
<style>
   .empty-cart-message {
      text-align: center;
      font-size: 18px;
      color: #777;
   }
</style>




