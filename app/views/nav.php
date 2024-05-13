<?php
include "config.php";

$user_id = $_SESSION['user_id'];
$select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
$cart_rows_number = mysqli_num_rows($select_cart_number); 
?>
<head>

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <!-- Meta SEO-->

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
        <!-- Include this in your HTML head or Font Awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <!--  Meta  Title Tag -->
     <title>Your Page Title</title>

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



<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand logo" href="index.php?page=home">
                <img src="app\views\assets\images\image-nav\logo.png" alt="Argan oil,argan oil benefits ,organic argan oil ,pure argan oil ,Moroccan argan oil, argan oil for hair ,argan oil for skin ,best argan oil products ,buy argan oil online ,argan oil uses, argan oil cosmetics, argan oil extraction process, cold-pressed argan oil, argan oil moisturizer ,natural beauty products, argan oil anti-aging, Argan oil benefits for skin, prickly pear oil,bulk, beauty products, beauty brand,beauty products online,argan oil of morocco,argan oil for face,argan oil price, 100%pure" style="width:15%">
                <span class="logo" id="title1" data-i18n="ARGAN">ARGAN</span>
                <span class="logo" id="title2" data-i18n="OIL">OIL</span>
            </a>
            <button class="navbar-toggler custom-toggler" id="menu-toggle-btn" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span style="font-size:15px; color: white; font-weight:bold;">
                Menu
              </span>
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav"> &emsp;&emsp;&emsp;&emsp;
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" style="color:aliceblue; font-family:Arial, Helvetica, sans-serif; font-weight: bold; " href="index.php?page=home" data-i18n="home">Home</a>
                                </li>&ensp;&emsp;&ensp;
                                <li class="nav-item">
                                    <a class="nav-link" style="color:aliceblue; font-family:Arial, Helvetica, sans-serif; font-weight: bold; "  href="index.php?page=About3" data-i18n="about">About</a>
                                </li>&ensp;&emsp;&ensp;
                                
                                <li class="nav-item dropdown btn-group d-flex flex-wrap" id="dropdownProduct">
                                    <a class="nav-link" style="color:aliceblue; font-family:Arial, Helvetica, sans-serif; font-weight: bold; "  href="index.php?page=product" role="button" data-i18n="product">
                                        Blogs
                                    </a>
                                    <a class="nav-link btn dropdown-toggle dropdown-toggle-split" style="color:aliceblue; font-family:Arial, Helvetica, sans-serif; font-weight: bold; "  href="#" role="button" id="navbarDropdownProducts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                    </a>
                                      
                                      
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
                                      
                                          <a class="dropdown-item" style="color:rgb(1, 133, 25); font-family:Arial, Helvetica, sans-serif; font-weight: bold; " href="index.php?page=product1">HUILE D’ARGAN EN VRAC</a>
                                          <a class="dropdown-item" style="color:rgb(1, 133, 25); font-family:Arial, Helvetica, sans-serif; font-weight: bold; " href="index.php?page=product2">HUILE D’ARGAN DE MARQUE PRIVÉE</a>
                                          <a class="dropdown-item" style="color:rgb(1, 133, 25); font-family:Arial, Helvetica, sans-serif; font-weight: bold; " href="index.php?page=product3">VENTE EN GROS D’HUILE D’ARGAN</a>
                                      
                                      </div>
                                    
                                </li>
                                &ensp;&emsp;&ensp;
                                <li class="nav-item">
                                    <a class="nav-link" style="color:aliceblue; font-family:Arial, Helvetica, sans-serif; font-weight: bold; "  href="index.php?page=blog2" data-i18n="blog">Products</a>
                                </li>&ensp;&emsp;&ensp;
                                
                                <li class="nav-item">
                                    <a class="nav-link"  style="color:aliceblue; font-family:Arial, Helvetica, sans-serif; font-weight: bold; " href="index.php?page=contact" data-i18n="contact">Contact</a>
                                </li>
                                 <li class="nav-item">
                                 <div class="user-icon" id="userIcon">
                                  <a href="#" class="nav-link" > 
                                    <i class="fas fa-user" style="color:white;"></i>
                                    <div class="user-info" id="userInfo">
                                        <p > 
                                            username: <span style="color:black;"><?php echo $_SESSION['user_name']; ?></span>
                                            email: <span style="color:black;"><?php echo $_SESSION['user_email']; ?></span>
                                        </p>
                                        
                                    </div>
                                </div>
                                </a>
                                  </li>
                                  <li class="nav-item">
                                  <a href="index.php?page=search"  class="nav-link" >
                                  <i class="fas fa-search" style="color: white; font-size: 20px;"></i> 
                                  </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="index.php?page=cart" class="nav-link">
                                          <i class="fas fa-shopping-cart"></i> 
                                          <span class="d-md-none d-lg-inline" style="color:white;">(<?php echo $cart_rows_number; ?>)</span>
                                      </a>
                                      
                                  </li>
                                  <li>
                                  <a href="admin2/logout.php" class="nav-link" style="color:white;" >logout</a>
                                  </li>

                            </ul>
                            
                        
                    

          </div>
     </div>
</nav>
<!-- image slider -->

      <div class="image-slider">
        <button class="slider-btn" id="prev-btn">&#8249;</button>
        <img class="img" src="app\views\assets\images\image-nav\4.png" alt="Argan oil,argan oil benefits ,organic argan oil ,pure argan oil ,Moroccan argan oil, argan oil for hair ,argan oil for skin ,best argan oil products ,buy argan oil online ,argan oil uses, argan oil cosmetics, argan oil extraction process, cold-pressed argan oil, argan oil moisturizer ,natural beauty products, argan oil anti-aging, Argan oil benefits for skin, prickly pear oil,bulk, beauty products, beauty brand,beauty products online,argan oil of morocco,argan oil for face,argan oil price, 100%pure">
        <button class="slider-btn" id="next-btn">&#8250;</button>
    </div>

</head>
<!-- javascript navbar scrolling -->
<script>
  document.getElementById("menu-toggle-btn").addEventListener("click", function(e) {
    e.stopPropagation();
    const navbar = document.querySelector(".navbar-collapse");
    if (navbar.classList.contains("show")) {
        navbar.classList.remove("show");
    } else {
        navbar.classList.add("show");
    }
});

    window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    const scrolled = window.scrollY > 0;
    navbar.classList.toggle("scrolled", scrolled);
});

window.addEventListener("click", function() {
    const navbar = document.querySelector(".navbar-collapse");
    if (navbar.classList.contains("show")) {
        navbar.classList.remove("show");
    }
});


const images = ["app/views/assets/images/image-nav/3.png","app/views/assets/images/image-nav/4.png"

,"app/views/assets/images/image-nav/8.jpg"

]; // Liste de vos images
const imgElement = document.querySelector(".img");
const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");

let currentImageIndex = 0;
$(document).ready(function() {

$(".dropdown-toggle").dropdown();

});
// Fonction pour afficher l'image courante
function displayCurrentImage() {
    imgElement.src = images[currentImageIndex];
}

// Fonction pour passer à l'image suivante
function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    displayCurrentImage();
}

// Fonction pour passer à l'image précédente
function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    displayCurrentImage();
}

// Écouteurs d'événements pour les boutons
nextBtn.addEventListener("click", nextImage);
prevBtn.addEventListener("click", prevImage);

// Défilement automatique
function autoSlide() {
    nextImage();
}

// Démarrez le défilement automatique toutes les 5 secondes (5000 millisecondes)
setInterval(autoSlide, 3000);


</script>
<!-- style navbar scrolling -->

<!-- traduction page -->
<script>
 


const languageSelector = document.querySelector("select");
languageSelector.addEventListener("change", (event) => {
  setLanguage(event.target.value);
  localStorage.setItem("lang", event.target.value);
 

});

const setLanguage = (language) => {
    const elements = document.querySelectorAll("[data-i18n]");
    elements.forEach((element) => {
      const translationKey = element.getAttribute("data-i18n");
      element.textContent = translations[language][translationKey];
    });
    document.dir = language === "ar" ? "rtl" : "ltr"; 
    document.body.style.textAlign = language === "ar" ? "right" : "left";
    if(language ==="ar"){
      const nameInput = document.querySelector('[name="name"]');
      nameInput.placeholder = translations[language].Enteryourname;

    const phoneInput = document.querySelector('[name="phone"]');
    phoneInput.placeholder = translations[language].Enteryourphone;

    const mailInput = document.querySelector('[name="email"]');
    mailInput.placeholder = translations[language].Enteryourmail;
    const subjectInput = document.querySelector('[name="subject"]');
    subjectInput.placeholder = translations[language].Enteryoursubject;
    const messageInput = document.querySelector('[name="message"]');
    messageInput.placeholder = translations[language].Enteryourmessage;
    const subInput = document.querySelector('[name="Submit2"]');
    subInput.value = translations[language].send;
    }; 
};
document.addEventListener("DOMContentLoaded", () => {
    const language = localStorage.getItem("lang") || "en" || "fr" || "ar";// اذا لم تكن اللغة متوفرة استخدم الانجليزية
    setLanguage(language);
    console.log(language);
  });
  
</script>
 <style>
/* Add this inside your <style> or CSS file */





@media (max-width: 768px) {
  .logo-space {
    margin-right: 5px; /* Ajustez la valeur de la marge selon vos besoins */
  }
}

    
.a{
    text-decoration: none;
    color: rgb(15, 145, 251);
}

.logo {
  display: inline-block;
}
.img{
        height: 800px ;
        width: 100%;
    }
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    background-color: none;
    z-index: 1000;
    transition: background-color 1s;
    color: rgb(126, 78, 17);
}

.navbar.scrolled {
    background-color: rgb(0, 128, 0);
    opacity: 1;
}

.navbar-logo {
    margin-right: auto;
}

.navbar-menu {
    list-style: none;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;

}

.navbar-menu li a {
    margin: 0 15px
}

.navbar-dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ddd;
    top: 100%;
    left: 0;
    min-width: 160px;
    z-index: 1;
    margin-top: 10px;
}

.navbar-dropdown:hover .dropdown-content {
    display: block;
}

.navbar-lang {
    margin-left: auto;
    margin-right: auto;
}

.lang-dropdown {
    position: relative;
    cursor: pointer;

}

.lang-dropdown:hover .dropdown-content {
    display: block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ddd;
    top: 100%; 
    left: 0;
    min-width: 160px;
    z-index: 1;
}
li a, .dropbtn {
  display: inline-block;
  color: rgb(251, 250, 250);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li.dropdown {
  display: inline-block;
  position: relative;
}
.dropdown-content a:hover{background-color: #008509;}
.dropdown-toggle-split:hover{background-color: #008509;}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
li a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(2, 130, 21);
}

li {
  float: left;
}


#title1 { color: rgb(253, 248, 248); font-size: 23px;}
#title2 { color: rgb(44, 221, 44); margin-right: 12%; font-size: 23px; }

.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 24px;
  background: transparent;
  border: none;
  color: white;
  cursor: pointer;
  z-index: 1;
}

#prev-btn {
  left: 10px;
}

#next-btn {
  right: 10px;
}

@media (max-width: 768px) {
  .navbar-brand {
    display: flex;
    align-items: center;
    margin-right: 10px; /* Réduisez la marge droite */
  }
  
  #dropdownProduct {
    flex-direction: column;
  }
  
  .logo {
    margin-right: 5px; /* Réduisez la marge entre le logo et le texte */
  }

  /* Réduisez l'espace entre les éléments du menu */
  .navbar-menu li {
    margin-right: 5px;
  }

  /* Déplacez le bouton du menu de trois traits complètement à droite */
  .custom-toggler {
    margin-left: auto;
  }

  /* Responsive user icon and info */
  .user-icon {
    display: center;
    align-items: center;
  }

  .user-info {
    margin-left: 10px; /* Adjust as needed */
  }

  .user-info p {
    margin: 0; /* Remove default paragraph margin */
  }
  .navbar-menu li {
        text-align: center;
    }

    .navbar-menu li .user-icon {
        display: block;
        margin: 10px auto; /* Adjust as needed */
    }

    .navbar-menu li .user-info {
        margin-left: 0; /* Reset margin */
    }
}



.user-icon {
    position: relative;
    cursor: pointer;
}

.user-info {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background-color: #fff;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: none;
}

.user-icon:hover .user-info {
    display: block;
}
.fa-shopping-cart {
    color: #008000; /* Green color */
}

.fa-shopping-cart:hover {
    color: #006400; /* Darker green for hover effect */
}

.navbar.scrolled {
    background-color: #918151; /* Change this to the desired color */
    opacity: 1;
}

/* Add these styles to your existing CSS or style section */
.logout {
    color: #f5deb3; /* Argan oil green color */
    text-decoration: none;
    font-weight: bold;
    padding: 8px 16px;
    transition: background-color 0.3s, color 0.3s;
    margin-right: 10px; /* Add some margin to the right */
}

.logout:hover {
    background-color: none; /* Argan oil green color */
    color: none; /* White text on hover */
}   

</style>

