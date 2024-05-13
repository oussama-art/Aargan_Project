  <!-- app/views/home.php -->
  <?php
$number_products = 0;
  include 'config.php';

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
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vente d'huile d'argan et huile de pépins</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@300&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo&family=Ubuntu&display=swap">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Arimo&family=Ubuntu&display=swap');

    body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        overflow-x: hidden;
    }

    #content {
        flex: 1;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .col-md-4:hover .image {
        opacity: 0.3;
    }

    .col-md-4:hover .middle {
        opacity: 1;
    }

    .text {
        color: black;
        font-size: 30px;
        padding: 16px 32px;
        font-family: 'Arimo', sans-serif;
    }

    h1:hover {
        text-decoration: underline overline;
    }

    .cont .row .col-md-3 p {
        text-align: center;
        color: white;
    }

    #col4 .img-fluid {
        width: 50%;
        padding: 2%;
    }

    #col4 h3 {
        text-align: center;
        font-family: 'Lexend Giga', sans-serif;
        color: white;
    }

    #col4 p {
        color: white;
    }

    #col4 .btn {
        margin-left: 60%;
    }

    .video_container {
        display: inline-block;
        position: relative;
        width: 30%;
        overflow: hidden;
        margin-right: 3%;
        margin-left: 3%;
        margin-bottom: 10px;
        padding-top: 24.2%;
    }

    .video {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .cont {
        margin-top: -25px;
        margin-bottom: 25px;
        text-align: center;
    }

    h1 {
        font-size: 36px;
        color: #6B4226; /* Earthy brown color */
    }

    hr {
        border: 2px solid #6B4226; /* Earthy brown color */
        margin: 20px 0;
    }

    .card-text {
        font-size: 18px;
        font-weight: bold;
        color: #444; /* Dark brown color */
        margin: 20px 0;
    }

    .row {
        
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .col-md-3 {
        text-align: center;
        padding: 15px;
        border: 1px solid #E5C29F; /* Light brown border */
        border-radius: 5px;
        transition: transform 0.3s;
        margin: 10px;
        background-color: #D1B95C; /* Pale yellow background color */
    }

    .col-md-3 h5 {
        font-size: 24px;
        color: #6B4226; /* Earthy brown color */
        margin: 20px 0;
    }

    .col-md-3 p {
        font-size: 16px;
        color: #444; /* Dark brown color */
        margin: 0;
    }

    .col-md-3:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(107, 66, 38, 0.2); /* Shadow in earthy brown */
    }

    /* @media (max-width: 767px) {
        .video_container {
            width: 100%;
            margin-right: 0;
            margin-left: 0;
        }
    } */
    @media (max-width: 767px) {
    .video_container {
        width: 100%;
        margin-right: 0;
        margin-left: 0;
        padding-top: 56.25%; /* Maintain aspect ratio for responsive video */
    }

    .video_container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
}

    /* Additional styles... */

    .title {
        font-size: 36px;
        color: #6B4226; /* Earthy brown color */
        margin-bottom: 20px;
    }

    .box-cont {
        display: flex;
        justify-content: space-around;
    }

    .box {
        width: 300px;
        text-align: center;
    }

    .box img {
        max-width: 50%;
        height: auto;
    }

    .name {
        font-size: 18px;
        margin: 10px 0;
    }

    .price {
        font-size: 16px;
        color: #444; /* Dark brown color */
        margin: 10px 0;
    }

    .qty {
        width: 50px;
    }

    .btn {
        background-color: #6B4226; /* Earthy brown color */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #543219; /* Darker brown color on hover */
    }

    .empty {
        font-size: 18px;
        color: #6B4226; /* Earthy brown color */
        margin: 20px 0;
    }

    

    #whatsappButton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
    display: flex;
    align-items: center;
}

#whatsappButton span {
    font-size: 16px;
    font-weight: bold;
    color: #4CAF50; /* Green color, adjust as needed */
    text-decoration: none;
    margin-right: 5px; /* Adjust the margin if needed */
    letter-spacing: 1px; /* Adjust letter spacing if needed */
}

#whatsappButton img {
    width: 30px;
    height: auto;
}

#whatsappButton a {
    text-decoration: none;
    color: inherit;
}

#whatsappButton:hover {
    background-color: transparent;
}

/* Responsive Styles */
@media (max-width: 767px) {
    #whatsappButton {
        bottom: 10px;
        right: 10px;
    }

    #whatsappButton span {
        font-size: 14px;
    }

    #whatsappButton img {
        width: 25px;
    }
}


</style>

  </head>
  <body>
  <nav>
  <?php include "nav.php"; 
  ?>
  </nav>
  <div >


        <!-- ***************************************products************************************ -->
  <section class="products">
  <h1 style="margin-top:5%;margin-bottom:5%;">Our Products</h1>
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
          $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 4") or die('query failed');
          $number_products = $number_products + 1;
          if (mysqli_num_rows($select_products) > 0 && $number_products <= 3) {
              while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          ?>
          <div class="col" style="margin-bottom:2%;">
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

  <h1 style="margin-top:5%;margin-bottom:5%;">Our Values</h1>

  <div class="column-container">
        <!-- Column 1 -->
        <div class="column">
            <img src="app/views/assets/images/icon/responsabilite.png" alt="Icon 1">
            <h2>Responsibility</h2>
            <p>a Service Focused on Respect and Professionalism towards Our Clients.</p>
        </div>

        <!-- Column 2 -->
        <div class="column">
            <img src="app/views/assets/images/icon/innovation.png" alt="Icon 2">
            <h2>Innovation</h2>
            <p>Inventiveness at the Heart of Oriental Group: Committed to Customer Satisfaction and the Prosperity of the Company.</p>
        </div>

        <!-- Column 3 -->
        <div class="column">
            <img src="app/views/assets/images/icon/authenticite.png" alt="Icon 3">
            <h2>Authenticity</h2>
            <p>Authentic Commitment: Our Dedication to Providing Products of Moroccan Origin with Sincerity.</p>
        </div>
    </div>

      <h1 class="custom-font text-center text-uppercase" data-i18n="bestoffer" style="margin-top:5%;margin-bottom:5%;">Best Offer</h1>
      <div class="cont" style="margin-top:3px;">
      <div class="row">
          <div class="col-md-4">
              <img src="app/views/assets/images/img-product/bulk.jpg" alt="BULK ARGAN OIL,Argan oil,argan oil benefits ,organic argan oil ,pure argan oil ,Moroccan argan oil, argan oil for hair ,argan oil for skin ,best argan oil products ,buy argan oil online ,argan oil uses, argan oil cosmetics, argan oil extraction process, cold-pressed argan oil, argan oil moisturizer ,natural beauty products, argan oil anti-aging, Argan oil benefits for skin, prickly pear oil,bulk, beauty products, beauty brand,beauty products online,argan oil of morocco,argan oil for face,argan oil price, 100%pure"class="image" >           
      <div class="middle">
          <div class="text" data-i18n="bulk">BULK ARGAN OIL</div>
      </div>
          </div>
          <div class="col-md-4">
              <img src="app/views/assets/images/img-product/label.jpg" alt="PRIVATE LABEL ARGAN OIL,Argan oil,argan oil benefits ,organic argan oil ,pure argan oil ,Moroccan argan oil, argan oil for hair ,argan oil for skin ,best argan oil products ,buy argan oil online ,argan oil uses, argan oil cosmetics, argan oil extraction process, cold-pressed argan oil, argan oil moisturizer ,natural beauty products, argan oil anti-aging, Argan oil benefits for skin, prickly pear oil,bulk, beauty products, beauty brand,beauty products online,argan oil of morocco,argan oil for face,argan oil price, 100%pure" class="image">
              <div class="middle">
    <div class="text" data-i18n="private">PRIVATE LABEL ARGAN OIL</div>
    </div>
          </div>
          <div class="col-md-4">
              <img src="app/views/assets/images/img-product/wholesale.jpg" alt="WHOLESALE ARGAN OIL,Argan oil,argan oil benefits ,organic argan oil ,pure argan oil ,Moroccan argan oil, argan oil for hair ,argan oil for skin ,best argan oil products ,buy argan oil online ,argan oil uses, argan oil cosmetics, argan oil extraction process, cold-pressed argan oil, argan oil moisturizer ,natural beauty products, argan oil anti-aging, Argan oil benefits for skin, prickly pear oil,bulk, beauty products, beauty brand,beauty products online,argan oil of morocco,argan oil for face,argan oil price, 100%pure" class="image">
              <div class="middle">
    <div class="text" data-i18n="WHOLESALE">WHOLESALE ARGAN OIL</div>
    </div>
          </div>
      </div>






        <!-- ***************************************fin products******************************** -->
    <div class="cont" style="width: 100%; height:100%; overflow: hidden; margin-top: 5%; margin-bottom: 5%; padding: 10px;">
    <h1 class="custom-font text-center text-uppercase" data-i18n="whychooseourcompany" style="margin-top:5%;margin-bottom:5%;">Why Choose Our Company</h1>
    <hr>
    <p class="card-text text-center font-weight-bold" data-i18n="offers">We offer a variety of products and services to help you succeed</p>
    <div class="row" id="row1">
      <div class="col-md-3">
        <div class="feature">
          <img src="app/views/assets/images/img-home/drop.png" alt="Cold Pressed Argan Oil" class="img-fluid">
          <h5>7000</h5>
          <p data-i18n="COLDPRESSEDARGANOIL">7000 LITRES OF COLD PRESSED ARGAN OIL SOLD AND DISTRIBUTED WORLDWIDE BY ARGAN OIL MOROCCO.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="feature">
          <img src="app/views/assets/images/img-home/heart.png" alt="Customer Satisfaction" class="img-fluid">
          <h5>100</h5>
          <p data-i18n="SATISFACTIONGUARANTEED">100% SATISFACTION GUARANTEED, EVERY CUSTOMER WAS PLEASED.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="feature">
          <img src="app/views/assets/images/img-home/check.png" alt="Returning Customers" class="img-fluid">
          <h5>80</h5>
          <p data-i18n="OURCUSTOMERS">80% OF OUR CUSTOMERS RETURN FOR MORE ORDERS, THE OTHER 20% WILL RE ORDER</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="feature">
          <img src="app/views/assets/images/img-home/gift.png" alt="Supporting Families" class="img-fluid">
          <h5>170</h5>
          <p data-i18n="FAMILIES">OVER 170 WOMEN & FAMILIES HELPED AND ASSISTED BY OUR COOPERATIVE IN MOROCCO</p>
        </div>
      </div>
    </div>
  </div>

  <h1 style="margin-top:5%;margin-bottom:5%;">PARTENAIRES</h1>
<div class="how-section1" style="margin-bottom:0;padding-bottom:3%;">
<div class="row">
                        <div class="col-md-6 how-img">
                             <img src="app/views/assets/images/img-home/Logo-Association-Bayti-200x300-1.png" class="img-fluid" alt=""/>
                        </div>
                        <div class="col-md-6">
                            <h4>Discover the Elixir of Beauty: The Wonders of Argan Oil</h4>
                                        <h4 class="subheading">With GetLance, you have the freedom and flexibility to control when, where, and how you work. Each project includes an online workspace shared by you and your client, allowing you to:</h4>
                                        <p class="text-muted">To actively participate in promoting sustainable development in Morocco, 
                        the employees of ORIENTAL GROUP have established a charitable organization named BAYTI Association.
                        This association, completely independent of any political, religious, or commercial commitments, collaborates exclusively with local volunteers.</p>
                        </div>
                    </div>
</div>

<div class="partContainer">
    <div class="patr">
        <h1 class="text-center mb-4" style="margin:0;font-size: 36px;color: black;">We are proud to belong to:</h1>
        <div class="partner-logos">
            <a class="partner-logo" href="https://asmex.org/">
                <img src="app/views/assets/images/img-home/ASMEX-LOGO.png" alt="Partner 1" class="img-fluid">
            </a>
            <a class="partner-logo" href="https://www.clusterenr.ma/">
                <img src="app/views/assets/images/img-home/cluster.png" alt="Partner 2" class="img-fluid">
            </a>
            <a class="partner-logo" href="https://www.finances.gov.ma/fr/Pages/detail-actualite.aspx?fiche=1228">
                <img src="app/views/assets/images/img-home/Maroc-Export-vff-768x480.png" alt="Partner 3" class="img-fluid">
            </a>
           
        </div>
    </div>
</div>
      

  <h1 class="custom-font text-center text-uppercase" data-i18n="whychooseourcompany">why choose our company</h1>
  <div class="video_container">
          <iframe   width="400" class="video"  src="https://www.youtube.com/embed/CPrrWKGsfeQ" title="Oriental Group Factory - Argan Oil Production Process" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div> 

      <div class="video_container">
          <iframe style="width:"  class="video"  src="https://www.youtube.com/embed/CANH9FedrQk" title="Oriental Group: our products - argan oil -moroccan black soap - rhassoul" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>        
      </div> 

      <div class="video_container">
          <iframe  class="video"  src="https://www.youtube.com/embed/b4_nesjSrb0" title="Huile d’argan cosmétique" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>

      <div class="video_container">
          <iframe  class="video"  src="https://www.youtube.com/embed/NUIKBfWBw7Q" title="Organic Argan Oil Manufacturer, wholesaler and brand-making industrie" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>  

  </div>



      </section>
          <?php require "Footeer.php" ?>
  
          <button id="whatsappButton">
              <a href="https://api.whatsapp.com/send?phone=+212600604387">
                  <span>Contact Us</span>
                  <img src="app/views/assets/images/icon/whatsapp.png" alt="WhatsApp Icon" width="30">
              </a>
          </button>


      
      <script>
          document.getElementById("whatsappButton").addEventListener("click", function(event) {
              event.preventDefault();
              var phoneNumber = "+212600604387";
              var whatsappURL = "https://api.whatsapp.com/send?phone=" + phoneNumber;
              window.open(whatsappURL, '_blank');
          });
      </script>
          </div>


      </div>
      <style>
        /* Container for the columns */
        .column-container {
          background-color:#D1B95C;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        /* Style for each column */
        .column {
            width: 30%;
            margin: 15px;
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
        }
        @media (max-width: 768px) {
    .column {
        width: 100%; /* Full width on smaller screens */
    }
  }

        /* Style for the title */
        .column h2 {
            color: #333;
        }

        /* Style for the image icon */
        .column img {
            width: 48px; /* Adjust the width as needed */
            height: 48px; /* Adjust the height as needed */
            object-fit: cover;
        }

        /* Style for the text */
        .column p {
            color: #666;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .how-section1{
    margin-top:-15%;
    padding: 10%;
}
.how-section1 h4{
    color: black;
    font-weight: bold;
    font-size: 30px;
}
.how-section1 .subheading{
    color: black;
    font-size: 20px;
}
.how-section1 .row
{
    margin-top: 10%;
}
.how-img 
{
    text-align: center;
}
.how-img img{
    width: 40%;
}
    </style>
    <style>
    .partContainer {
        padding: 5px;
        text-align: center;
    }

    .patr {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .patr h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
        width: 100%;
    }

    .partner-logos {
        display: flex;
        justify-content: space-around;
        
    }

    .partner-logo {
        margin: 10px;
       
    }

    .partner-logo:hover {
        transform: scale(1.1);
    }

    .partner-logo img {
        max-width: 400px;
        height: auto;
        border-radius: 5px;
        
        cursor: pointer;
    }
    @media (max-width: 768px) {
    .patr {
        flex-direction: column; /* Stack columns vertically on smaller screens */
    }

    .partner-logos {
        flex-direction: column; /* Stack logos vertically on smaller screens */
    }

    .partner-logo {
        margin: 10px 0; /* Adjust spacing between logos on smaller screens */
    }
}
</style>
<style>
    .products {
       
        padding: 40px 0; /* Add some padding to the top and bottom */
    }

    .card {
        transition: transform 0.2s ease-in-out; /* Add a smooth transition effect to the card */
        margin-bottom:1%;
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