<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['delete'])){
   $delete_id = $_POST['Suppr_id'];
   mysqli_query($conn, "DELETE FROM `newsletter` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="images/admin.png" type="image/x-icon">
   <title>Messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <!-- <link rel="stylesheet" href="css/admin_style.css"> -->

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">
      <h1 class="title">Messages</h1>
      <div class="box-container">
         <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `newsletter`") or die('query failed');
            if(mysqli_num_rows($select_message) > 0){
               while($fetch_message = mysqli_fetch_assoc($select_message)){
         ?>
         <div class="box">
            <form action="" method="post">
               <input type="hidden" name="Suppr_id" value="<?php echo $fetch_message['id']; ?>">
               <p>Email: <span><?php echo $fetch_message['email']; ?></span></p>
               <input type="submit" name="delete" value="Delete" class="btn btn-primary btn-sm">
            </form>
         </div>
         <?php
               }
            } else {
               echo '<p class="empty text-center">You have no messages!</p>';
            }
         ?>
      </div>
   </section>








<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
<style>
      /* Add your custom styles here */

      .messages {
         margin: 20px;
      }

      .title {
         text-align: center;
      }

      .box-container {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
      }

      .box {
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 8px;
         padding: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         margin: 10px;
      }

      .box p {
         margin: 0;
         font-size: 16px;
      }

      .btn {
         margin-top: 10px;
      }
   </style>