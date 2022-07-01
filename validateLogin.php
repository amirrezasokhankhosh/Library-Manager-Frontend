<?php
include "db_conn.php";
session_start();
    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $user = validate($_POST['username']);
        $pass = validate($_POST['password']);

        if (empty($user) || empty($pass)) {
            header("Location: login.php?error=Username and password required");
            exit();
        }else {
            $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_name'] = $row['Id'];
                header("Location: nav.html");
                exit();    
            }else {
                header("Location: login.php?error=Incorrect Username or password");
                exit();
            }
        }

    }else{
        header("Location: login.php?");
        exit();
    }
        
?>