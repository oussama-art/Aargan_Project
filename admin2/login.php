<?php

include 'config.php';
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
   header('location:../../aargan/index.php?page=home'); // Redirect to the dashboard or home page
    exit();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:../../aargan/index.php?page=home');
            exit(); // Add exit to stop script execution after redirect
        }
    } else {
        $message[] = 'Incorrect email or password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../app/views/assets/images/image-nav/logo.ico" type="image/x-icon">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <!-- custom css file link  -->
   
   <!-- <link rel="stylesheet" href="login.css">  -->

</head>
<body>
    <section class="vh-100" >
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                               <img src="images/login.jpg" alt="login form" class="img-fluid card-image" />
                        </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="post" action="">
                                        

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>
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

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example17"
                                                class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example27"
                                                class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit"
                                                class="btn btn-dark btn-lg btn-block" name="submit">Login</button>
                                        </div>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="register.php" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
<!-- Add this inside the <head> section -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: white;
    }

    .card {
        border-radius: 1rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
    }

    .card-image {
        height: 100%;
        object-fit: cover; /* Ensures the image covers the entire container */
        border-radius: 1rem 0 0 1rem;
    }

    .card-body {
        padding: 4rem 4rem 5rem 4rem;
    }

    .card-title {
        color: #ff6219;
    }

    .btn-dark {
        background-color: #393f81;
        border-color: #393f81;
    }

    .btn-dark:hover {
        background-color: #1e2170;
        border-color: #1e2170;
    }

    .text-muted {
        color: #393f81;
    }
    .message {
        background-color: #f8d7da; /* Light red background color */
        color: #721c24; /* Dark red text color */
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #f5c6cb; /* Border color */
        border-radius: 5px;
        position: relative;
    }

    .message span {
        margin-right: 10px;
    }

    .message i {
        cursor: pointer;
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: #721c24; /* Dark red icon color */
    }
</style>

