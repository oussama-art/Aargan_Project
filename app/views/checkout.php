<?php

include 'config.php';


$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

   <title>checkout</title>
   <link rel="stylesheet" href="">
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'nav.php'; ?>


<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
   ?>
   <div class="card">
      <div class="card-body">
         <?php
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
               $grand_total += $total_price;
         ?>
         <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
         <?php
            }
         ?>
      </div>
      <div class="card-footer">
         <div class="grand-total"> grand total : <span>$<?php echo $grand_total; ?>/-</span> </div>
      </div>
   </div>
   <?php
      } else {
         echo '<p class="empty">your cart is empty</p>';
      }
   ?>

</section>

<section class="checkout">
   <form class="form1" action="" method="post">
      <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name:</span>
            <input type="text" name="name" required >
         </div>
         <div class="inputBox">
            <span>Your Number:</span>
            <input type="number" name="number" required >
         </div>
         <div class="inputBox">
            <span>Your Email:</span>
            <input type="email" name="email" required >
         </div>
         <div class="inputBox">
            <span>Payment Method:</span>
            <select name="method">
               <option value="cash on delivery">Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">PayPal</option>
               <option value="paytm">Paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 01:</span>
            <input type="number" min="0" name="flat" required >
         </div>
         <div class="inputBox">
            <span>Address Line 02:</span>
            <input type="text" name="street" required >
         </div>
         <div class="inputBox">
            <span>City:</span>
            <input type="text" name="city" required>
         </div>
         <div class="inputBox">
            <span>State:</span>
            <input type="text" name="state" required >
         </div>
         <div class="inputBox">
            <span>Country:</span>
            <input type="text" name="country" required >
         </div>
         <div class="inputBox">
            <span>Pin Code:</span>
            <input type="number" min="0" name="pin_code">
         </div>
      </div>
      <input type="submit" value="Order Now" class="btn" name="order_btn">
   </form>
</section>









<?php include 'Footeer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
<style>
   /* Add your own styles here */
   body {
  background-image: url('app/views/assets/images/img-home/pexels-andrzej-gdula-11149809.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
   .checkout {
      max-width: 800px;
      margin: 0 auto;
      margin-bottom:5%;
      
   }

   .form1 {
      background: #f4f4f4;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      /* Replace 'your-background-image.jpg' with the path to your image */ 
   }

   h3 {
      text-align: center;
      color: #333;
   }

   .flex {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
   }

   .inputBox {
      width: 48%;
      margin-bottom: 20px;
   }

   span {
      display: block;
      margin-bottom: 8px;
      color: black;
   }

   input,
   select {
      width: 100%;
      padding: 15px;
      box-sizing: border-box;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
   }

   input[type="submit"] {
      background: #4caf50;
      color: #fff;
      cursor: pointer;
   }

   input[type="submit"]:hover {
      background: #45a049;
   }
</style>

<style>
   <style>
      body {
         font-family: 'Arial', sans-serif;
      }

      .display-order {
         margin-top: 20px;
      }

      .card {
         width: 400px;
         margin: 0 auto;
         margin-bottom:3%;
      }

      .card-body {
         padding: 20px;
      }

      .grand-total {
         font-weight: bold;
      }

      .empty {
         text-align: center;
         font-weight: bold;
      }
  
</style>
<style>
   
</style>