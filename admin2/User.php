<?php

// user.php

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($name, $email, $password, $cpassword, $user_type)
    {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, md5($password));
        $cpassword = mysqli_real_escape_string($this->conn, md5($cpassword));

        $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

        if (mysqli_num_rows($select_users) > 0) {
            return 'user already exists!';
        } else {
            if ($password != $cpassword) {
                return 'confirm password not matched!';
            } else {
                mysqli_query($this->conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpassword', '$user_type')") or die('query failed');
                return 'registered successfully!';
            }
        }
    }
}

?>
