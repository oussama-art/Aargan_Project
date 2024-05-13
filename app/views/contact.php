<?php 
include_once 'sub.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- favicon-->
        <link rel="icon" href="app/views/assets/images/image-nav/logo.ico" type="image/x-icon">
       <!--  bootstrapp  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <!--  javascript bootstrap  -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!--  bootstrapp  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <!--  Meta  Title Tag -->
     <title>Contact Us</title>

      <!-- Meta Description Tag:   -->
      <meta name="description" content="Discover the essence of beauty with our Moroccan Wholesale Argan Oil and organic cosmetics products. Embrace tradition and nature as we harness the power of natural ingredients for skincare and haircare. Shop now for radiant beauty!">
     <!--   Meta Keywords Tag: -->
     <meta name="keywords" content="Argan oil,argan oil benefits ,organic argan oil ,pure argan oil ,Moroccan argan oil, argan oil for hair ,argan oil for skin ,best argan oil products ,buy argan oil online ,argan oil uses, argan oil cosmetics, argan oil extraction process, cold-pressed argan oil, argan oil moisturizer ,natural beauty products, argan oil anti-aging, Argan oil benefits for skin, prickly pear oil,bulk, beauty products, beauty brand,beauty products online,argan oil of morocco,argan oil for face,argan oil price, 100%pure"/>

     <!--  Canonical Tag:   -->
     <link rel="canonical" href="http://localhost/arganoil-v2/index.php?page=contact">
     <!--  <meta name="robots" content="index, follow">  -->
     <meta name="robots" content="index, follow">
     <!--  Meta Description  -->
     <meta name="description" content="Buy Moroccan Wholesale argan oil and organic cosmetics products company. Using traditional ingredients and natural products for beauty skincare haircare." />
     <meta name="author" content="Oriental group">
     <!--   
        -for social media you can add 
        <meta property="og:title" content="Buy Moroccan Wholesale Argan Oil and Organic Cosmetics">
        <meta property="og:description" content="Discover the essence of beauty with our premium Moroccan Wholesale Argan Oil and organic cosmetics products. Embrace tradition and nature for radiant skincare and haircare.">
        <meta property="og:image" content="url-to-image">
          <meta property="og:url" content="http://localhost/arganoil-v2/index.php?page=home"> 
      -->




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="app/views/assets/css/contact.css">-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<title>Contact US</title>

</head> 
<body>
<nav>

<?php require 'nav.php'?>
</nav>
    <section class>
<h1 class="text text-center" data-i18n="contactus">Contact Us</h1>
<br><br>
    <?php if(!empty($statusMsg)){ ?>
    <div class="status-msg text-center <?php echo $status; ?>"><?php echo htmlspecialchars($statusMsg);?></div>
 <?php } ?>
 <div class="container">
 <div class="row justify-content-center">
    <div class="col-md-9">
        <form action="" method="post" class="contact_us" >
            <div class="mb-3">
                <label for="name" class="ml-4" style="width=100%"data-i18n="name">Name</label><br>
                <div class="col-sm-12">
                    <input type="text"  class="form-control " name="name"  placeholder="Enter your name" value="<?php echo !empty($postData['name'])? htmlspecialchars($postData['name']):''; ?>"  autocomplete="off" data-i18n="Enteryourname"><br>
                        <?php if (!empty($valE['name'])) { ?>
                        <p class="error-msg" data-i18n="errorMsg"><?php echo $valE['name']; ?></p>
                    <?php } ?>
                </div>
            </div>
        <div class="mb-3">
            <label for="phone" class="ml-4" data-i18n="phone">Phone number</label><br>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="phone"   placeholder="Enter your phone" value="<?php echo !empty($postData['phone'])? htmlspecialchars($postData['phone']):''; ?>"  autocomplete="off"  data-i18n="Enteryourphone"><br>
                <?php if (!empty($valE['phone'])) { ?>
                <p class="error-msg"><?php echo $valE['phone']; ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="ml-4" data-i18n="mail">Email</label><br>
                <div class="col-sm-12">
                    <input type="email"  class="form-control" name="email"  placeholder="Enter your email" value="<?php echo !empty($postData['email'])? htmlspecialchars($postData['email']):''; ?>"  autocomplete="off"  data-i18n="Enteryourmail"><br>
                    <?php if (!empty($valE['email'])) { ?>
                        <p class="error-msg" ><?php echo $valE['email']; ?></p>
                    <?php } ?>
                </div>
        </div>
        <div class="mb-3">
            <label for="subject" class=" ml-4" data-i18n="subject">Subject</label><br>
            <div class="col-sm-12">
                <input type="text"  class="form-control" name="subject"  placeholder="Enter subject" value="<?php echo !empty($postData['subject'])? htmlspecialchars($postData['subject']):''; ?>"  autocomplete="off"  data-i18n="Enteryoursubject"><br>
                    <?php if (!empty($valE['subject'])) { ?>
                        <p class="error-msg"><?php echo $valE['subject']; ?></p>
                    <?php } ?>  
            </div>  
        </div>
        <div class="mb-3">
            <label for="message" class="ml-4" data-i18n="message">Message</label><br>
            <div class="col-sm-12">
                    <textarea name="message" style="height: 100px; max-height:220px;" class="form-control" placeholder="Type your message here"  autocomplete="off"  data-i18n="Enteryourmessage"><?php echo !empty($postData['message'])? htmlspecialchars($postData['message']):''; ?></textarea><br>
                    <?php if (!empty($valE['message'])) { ?>
                        <p class="error-msg"><?php echo $valE['message']; ?></p>
                    <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <div name="reca" class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"> </div>
                    <?php if (!empty($valE['reca'])) { ?>
                    <p class="error-msg" style="color:red;margin-left: 3%;margin-top:1%;"><?php echo $valE['reca']; ?></p>
                <?php } ?>
        </div>
        <button type="Submit" class="btn btn-success rounded-pill btn-lg" name="Submit" data-i18n="send">Send</button>
        </form>
        </div>
       
        </div>
       </div>
       <div class="mb-3"></div>
       <!-- Contact information section -->

    <!-- Left column: Argan oil Morocco details -->
       
<!-- Google Maps iframe for displaying location -->
        <div class="mt-3">
      <div class="embed-responsive embed-responsive-16by9" style="width: 110%; height: 500px;margin-left:-4%;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3395.4353303347075!2d-8.043796925222656!3d31.676665039405027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafec7401bde29f%3A0x3aea484680928271!2sOriental%20GROUP!5e0!3m2!1sfr!2sma!4v1693341043985!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
    </div>
      </div>
      </section>
<?php require "Footeer.php" ?>
<style>
    body {
   
    overflow-x: hidden; /* Add this line to hide the scroll bar */
}

</style>
<style>
    .contact_us {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #333;
    }

    input,
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        color: #555;
    }

    .error-msg {
        color: red;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #218838;
    }

    .g-recaptcha {
        margin-bottom: 20px;
    }
    .col-md-3 {
            padding: 20px; /* Adjust the padding as needed */
            background-color: #f8f9fa; /* Background color */
            border-radius: 10px; /* Border radius for a rounded appearance */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle elevation */
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .col-md-3 img {
            width: 100%; /* Make the image fill the container */
            border-radius: 5px; /* Add border radius to the image */
        }
</style>


