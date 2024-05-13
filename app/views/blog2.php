<?php include 'config.php';


$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart!';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart!';
    }
 
 }
 ?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="app/views/assets/images/image-nav/logo.ico" type="image/x-icon">
    <!-- boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            overflow-x: hidden; /* Add this line to hide the scroll bar */

        }

       
        h1 {
            color: #343a40;
        }

        p {
            font-size: 18px;
            color: #343a40;
        }

        section.products {
            padding: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #007bff;
        }

        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        h1.title {
        transition: transform 0.3s ease-in-out;
        }

        h1.title:hover {
        transform: scale(1.1);
        }
        
        
        
    </style>
    <title>Argan Oil Blogs  </title>
</head>

<body>
    <nav>
        <?php require 'nav.php' ?>
    </nav>
    <div style="width:100%;align-items: center;text-align: center;">

        

        <hr style="width: 50%;height: 3px;background: #e6e6e6;border: none;margin: auto;">
        <br>

        <p><span data-i18n="at">At</span>&ensp;<strong><a href="https://group-oriental.com/fr/" style="color: black;"
                    data-i18n="arganoil">Argan Oil Morocco</a></strong><span data-i18n="weoffer"> , we offer cosmetic
                Argan oil and Argan food that can be purchased individually, through bulk orders,and <br> wholesales. We
                also offer our products with private labels.
                <br> <br> We supply major retailers around the world, including Europe, USA, Canada,<br> Japan, South
                Korea, Australia, and more.</span>
        </p>
    </div>

    <section class="products">
  <h1 style="margin-top:5%;margin-bottom:5%;text-align:center;">Our Products</h1>
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
  <div class="container mt-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">
      
          <?php
          $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
          if (mysqli_num_rows($select_products) > 0) {
              while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          ?>
          <div class="col">
              <div class="card h-100">
                  <img src="admin2/uploaded_img/<?php echo $fetch_products['image']; ?>"
                      class="card-img-top" alt="Product Image">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $fetch_products['name']; ?></h5>
                      <p class="card-text">$<?php echo $fetch_products['price']; ?>/-</p>
                      <form action="" method="post">
                      <input type="number" min="1" name="product_quantity" value="1" class="qty">
                          <input type="hidden" name="product_name"
                              value="<?php echo $fetch_products['name']; ?>">
                          <input type="hidden" name="product_price"
                              value="<?php echo $fetch_products['price']; ?>">
                          <input type="hidden" name="product_image"
                              value="<?php echo $fetch_products['image']; ?>"><br><br>
                          <button type="submit" class="btn btn-outline-primary" style=" background-color: #28a745; /* Set the primary button background color */
          border-color: #28a745;color:white" name="add_to_cart">Add to Cart</button>
                      </form>
                  </div>
              </div>
          </div>
          <?php
              }
          } else {
              echo '<p class="empty">No products added yet!</p>';
          }
          ?>

      </div>
  </div>

  </section>
</body>

</html>


<?php require 'Footeer.php'?>
<style>
    <style>
    .products {
       
        padding: 40px 0; /* Add some padding to the top and bottom */
    }

    .card {
        transition: transform 0.2s ease-in-out; /* Add a smooth transition effect to the card */
    }

    .card:hover {
        transform: scale(1.05); /* Enlarge the card on hover */
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        color: #333; /* Set the card title color */
        font-size: 1.2rem; /* Adjust the card title font size */
        margin-bottom: 10px; /* Add some bottom margin to the card title */
    }

    .card-text {
        color: #666; /* Set the card text color */
        font-size: 1rem; /* Adjust the card text font size */
        margin-bottom: 15px; /* Add some bottom margin to the card text */
    }

          .btn-primary {
          background-color: #28a745; /* Set the primary button background color */
          border-color: #28a745; /* Set the primary button border color */
      }

      .btn-primary:hover {
          background-color: #218838; /* Darken the button on hover */
          border-color: #218838; /* Darken the button border on hover */
      }


    .empty {
        color: #999; /* Set the color for the empty message */
        font-size: 1.2rem; /* Adjust the font size for the empty message */
        margin-top: 20px; /* Add some top margin to the empty message */
    }
</style>
</style>