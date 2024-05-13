<?php

include 'config.php';



$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $select_message = mysqli_query($conn, "SELECT * FROM `newsletter` WHERE  email = '$email' ") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `newsletter`(email) VALUES( '$email')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap-footer-02/fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_footer/bootstrap.min.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css_footer/style.css">

    <title>Footer 02</title>
  </head>
  <body>

    <footer class="footer-32892 pb-0">
      <div class="site-section">
          


        <div class="container">

          
          <div class="row">
          
            <div class="col-md pr-md-5 mb-4 mb-md-0">
              <h3>Our Office</h3>
              <p class="mb-4">Oriental GROUP
              N°200 Lot al massar , ZI sidi ghanem, Rte de 
              Safi,Marrakech 40100</p>
              <ul class="list-unstyled quick-info mb-4">
                <li><a  class="d-flex align-items-center"><span class="icon mr-3 icon-phone"></span> +212 524 335 449</a></li>
                <li><a  class="d-flex align-items-center"><span class="icon mr-3 icon-phone"></span> +212 524 457 961</a></li>
                <li><a  class="d-flex align-items-center"><span class="icon mr-3 icon-envelope"></span> contact@group-oriental.com</a></li>
              </ul>
              
            <form class="subscribe d-inline-block" action="" method="post" >
            <h3>Subscribe to Our Newsletter</h3>
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
              <input type="email" name="email" class="form-control" placeholder="Your email address" required>
              <button type="submit" name="submit" class="btn-submit">Subscribe</button>
            </form>
              
            </div>
            <div class="col-md mb-4 mb-md-0">
              <h3>Latest Tweet</h3>
              <ul class="list-unstyled tweets">
                <a href=https://www.paypal.com/paypalme/ORIENTALGROUP><img style="height: 50px;"src="app/views/assets/images/icon/th.jpg" alt="Image" ></a>
                
                  <a href=https://www.westernunion.com/fr/fr/send-money-to-morocco.html><img style="height: 50px;" src="app/views/assets/images/icon/wester.png" alt="Image" ></a>
              
                  <a href=https://www.wafacash.com/fr><img style="height: 50px;" src="app/views/assets/images/icon/wafacash.png" alt="Image" ></a>
           
              </ul>
            </div>
            


            <div class="col-md-3 mb-4 mb-md-0" style="background-color:#202126;border:none;box-shadow:none;">
              <h3>Brands</h3>
              <div class="row gallery" style="height:100%;">
                <div class="col-6">
                  <a href=https://www.bioprogreen.com><img src="app/views/assets/images/icon/brand1.png" alt="Image" class="img-fluid" target="blank"></a>
                  <a href="#"><img src="app/views/assets/images/icon/brand2.png" alt="Image" class="img-fluid"></a>
                </div>
                
              </div>
            </div>
            
            <div class="col-12">
              <div class="py-5 footer-menu-wrap d-md-flex align-items-center">
                <ul class="list-unstyled footer-menu mr-auto">
                <li><a href="index.php?page=home" data-i18n="home">HOME</a></li>
                  <li><a href="index.php?page=about" data-i18n="about">ABOUT</a></li>
                  <li><a href="index.php?page=product" data-i18n="product">PRODUCTS</a></li>
                  <li><a href="index.php?page=blog" data-i18n="blog">BLOG</a></li>
                  <li><a href="index.php?page=contact" data-i18n="contact">CONTACT</a></li>
                </ul>
                <div class="site-logo-wrap ml-auto">
                <a href="https://wa.me/1234567890" class="whatsapp"><img src="app/views/assets/images/icon/whatsapp.png" alt="..."></a>
                <a href="https://www.instagram.com/group_oriental/" class="instagram"><img src="app/views/assets/images/icon/instagram.png" alt="..."></a>
                <a href="https://web.facebook.com/grouporiental" class="facebook"><img src="app/views/assets/images/icon/facebook.png" alt="..."></a>
                <a href="https://www.youtube.com/@orientalgroupsarlau7063" class="youtube"><img src="app/views/assets/images/icon/yo.png" alt="..."></a>
            
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </footer>
    
    <script src="bootstrap-footer-02/js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-footer-02/js/popper.min.js"></script>
    <script src="bootstrap-footer-02/js/bootstrap.min.js"></script>
  </body>
</html>
<style>
  body {
  font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a, a:hover {
    text-decoration: none !important; }

.content {
  height: 70vh; }

.footer-32892 {
  background-color: #202126;
  padding: 7rem 0;
  color: #888;
  font-size: 16px; }
  .footer-32892, .footer-32892 h3 {
    font-family: "Poppins", sans-serif; }
  .footer-32892 h3 {
    font-size: 20px;
    color: #fff;
    margin-bottom: 30px; }
  .footer-32892 p {
    font-family: "Source Serif Pro", serif; }
  .footer-32892 .row.gallery {
    background-color: #202126;  
    margin-right: -5px;
    margin-left: -5px; }
    .footer-32892 .row.gallery > [class^="col-"],
    .footer-32892 .row.gallery > [class*=" col-"] {
      padding-right: 5px;
      padding-left: 5px; }
  .footer-32892 .gallery a {
    display: block;
    margin-bottom: 10px;
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease; }
    .footer-32892 .gallery a:hover {
      opacity: .5; }
  .footer-32892 .quick-info li {
    color: #fff;
    font-size: 16px;
    margin-bottom: 10px; }
    .footer-32892 .quick-info li a {
      color: #fff; }
    .footer-32892 .quick-info li .icon {
      font-size: 20px;
      color: #f88020; }
  /* .footer-32892 .subscribe {
    position: relative; }
    .footer-32892 .subscribe .form-control {
      background-color: #292b31;
      -webkit-box-shadow: none;
      box-shadow: none;
      border-radius: 30px;
      height: 55px;
      padding-left: 30px;
      padding-right: 130px;
      border: none;
      color: #fff; }
      .footer-32892 .subscribe .form-control::-webkit-input-placeholder {
        color: #ccc;
        font-size: 14px; }
      .footer-32892 .subscribe .form-control::-moz-placeholder {
        color: #ccc;
        font-size: 14px; }
      .footer-32892 .subscribe .form-control:-ms-input-placeholder {
        color: #ccc;
        font-size: 14px; }
      .footer-32892 .subscribe .form-control:-moz-placeholder {
        color: #ccc;
        font-size: 14px; }
    .footer-32892 .subscribe .btn-submit {
      background: #f88020;
      height: 47px;
      border-radius: 30px;
      padding-left: 30px;
      padding-right: 30px;
      color: #fff;
      font-weight: bold;
      position: absolute;
      top: 4px;
      right: 4px;
      -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2); } */
  .footer-32892 .tweets li {
    margin-bottom: 20px;
    font-size: 15px;
    font-style: italic;
    font-family: "Source Serif Pro", serif; }
    .footer-32892 .tweets li span {
      color: #fff; }
  .footer-32892 .footer-menu-wrap {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 2rem !important;
    margin-top: 7rem; }
  .footer-32892 .footer-menu {
    margin-bottom: 0; }
    .footer-32892 .footer-menu li {
      display: inline-block; }
      @media (max-width: 767.98px) {
        .footer-32892 .footer-menu li {
          display: block; } }
      .footer-32892 .footer-menu li a {
        padding: 10px;
        display: inline-block;
        color: #fff; }
        @media (max-width: 767.98px) {
          .footer-32892 .footer-menu li a {
            display: block;
            padding-left: 0px; } }
      .footer-32892 .footer-menu li:first-child a {
        padding-left: 0; }
  .footer-32892 .site-logo {
    color: #fff;
    font-size: 20px; }


    .footer-32892 .subscribe {
  position: relative;
}

.footer-32892 .subscribe .form-control {
  background-color: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 30px;
  height: 55px;
  padding-left: 15px;
  border: none;
  color: #fff;
  margin-bottom: 10px;
}

.footer-32892 .subscribe .form-control::-webkit-input-placeholder {
  color: #ccc;
  font-size: 14px;
}

.footer-32892 .subscribe .form-control::-moz-placeholder {
  color: #ccc;
  font-size: 14px;
}

.footer-32892 .subscribe .form-control:-ms-input-placeholder {
  color: #ccc;
  font-size: 14px;
}

.footer-32892 .subscribe .form-control:-moz-placeholder {
  color: #ccc;
  font-size: 14px;
}

.footer-32892 .subscribe .btn-submit {
  background: #8a6d3b; /* Argan oil color */
  height: 47px;
  border-radius: 30px;
  padding-left: 30px;
  padding-right: 30px;
  color: #fff;
  font-weight: bold;
  -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}

@media (max-width: 767.98px) {
  .footer-32892 .col-md {
    text-align: center; /* Center align content on small screens */
  }

  .footer-32892 .gallery a {
    margin-right: 0; /* Remove margin between gallery items on small screens */
  }
}

/* Tablet and larger screens */
@media (min-width: 768px) {
  .footer-32892 .col-md {
    text-align: left; /* Reset text alignment for larger screens */
  }
}

/* Adjust column layout for extra small screens */
@media (max-width: 575.98px) {
  .footer-32892 .col-6 {
    width: 100%; /* Make brand images full width on extra small screens */
  }
}
.site-logo-wrap a img {
    width: 30px; /* Adjust the width as needed */
    height: 30px; /* Adjust the height as needed */
    margin-right: 10px; /* Optional margin between icons */
}

/* Responsive styles for small screens */
@media (max-width: 767.98px) {
    .site-logo-wrap a img {
        width: 20px; /* Adjust the width for smaller screens */
        height: 20px; /* Adjust the height for smaller screens */
        margin-right: 5px; /* Optional margin between icons on smaller screens */
    }
}

/* Responsive styles for larger screens */
@media (min-width: 768px) {
    .site-logo-wrap a img {
        width: 40px; /* Adjust the width for larger screens */
        height: 40px; /* Adjust the height for larger screens */
        margin-right: 15px; /* Optional margin between icons on larger screens */
    }
}
</style>
