


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <title>Document</title>
</head>
<body>

<section class="ftco-section">
    <div class="container-fluid" style="padding-left:0;padding-right:0;">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="admin_page.php">Home</a></li>
                        <li class="nav-item"><a href="admin_products.php">Products</a></li>
                        <li class="nav-item"><a href="admin_users.php">Users</a></li>
                        <li class="nav-item"><a href="admin_orders.php">Orders</a></li>
                        <li class="nav-item"><a href="admin_contacts.php">Messages</a></li>
                        <li class="nav-item">
                            <div id="user-btn" class="fas fa-user" onclick="toggleUserInfo()">
                                <div id="user-info">
                                    <p>Username: <span><?php echo $_SESSION['admin_name']; ?></span></p>
                                    <p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
                                    <a href="logout.php" class="delete-btn">Logout</a>
                                    <div>New <a href="login.php">Login</a> | <a href="register.php">Register</a></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->
    </div>
</section>

<script>
    function toggleUserInfo() {
        var userInfo = document.getElementById("user-info");
        userInfo.style.display = (userInfo.style.display === "none" || userInfo.style.display === "") ? "block" : "none";
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
     function closeUserInfo() {
        var userInfo = document.getElementById("user-info");
        userInfo.style.display = "none";
        document.removeEventListener("click", closeUserInfo);
    }
</script>
</body>
</html>
<style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    #user-btn {
    cursor: pointer;
}

#user-btn:hover {
    
    color: #007bff; 
}
    .ftco-section {
      padding: 2em 0;
     
    }

    .ftco_navbar {
      background-color: #ffffff; 
      
    }

    .navbar-brand {
      font-size: 1.5em;
      font-weight: bold;
    }

    .navbar-toggler {
      border: none;
    }

    .navbar-nav {
      margin-right: 1em;
    }

    .navbar-nav .nav-item {
      margin: 0 0.5em;
    }

    .icons {
      display: flex;
      align-items: center;
    }

    .icons .fas {
      margin-right: 0.5em;
      cursor: pointer;
    }

    .account-box {
       
        display: none;
        position: absolute;
        top: 60px;
        right: 10px;
        padding: 1em;
        background-color: #ffffff; 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        z-index: 1000;
    }

   
    #user-info {
    display: none;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 1em;
    position: absolute;
    top: 60px;
    right: 10px;
    z-index: 1000;
    font-family: 'Roboto', sans-serif; 
    font-size: 14px;
}

#user-info p {
    margin: 0.5em 0;
}

#user-info .delete-btn {
    color: #fff;
    background-color: #dc3545; 
    padding: 0.5em 1em;
    text-decoration: none;
    display: inline-block;
    margin-top: 1em;
}

#user-info a {
    text-decoration: none;
    color: #007bff; 
}

#user-info a:hover {
    text-decoration: underline;
}


    @media (max-width: 768px) {
        .account-box {
            top: 40px;
            right: 0;
        }

        #user-info {
            top: 40px;
            right: 10px;
        }
    }
    .navbar-brand {
    font-size: 1.5em;
    font-weight: bold;
    color: #007bff; /* Change to your desired color */
    text-decoration: none;
}

.navbar-brand:hover {
    color: #0056b3; /* Change to your desired hover color */
    text-decoration: underline;
}
  </style>
