<?php 
    $showError = 'false';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "_dbconnect.php";
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['signupPassword'];
        $cpass = $_POST['signupcPassword'];

        // check whether user_email already exist or not.
        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $result = mysqli_query($conn,$existSql);
        $numrows = mysqli_num_rows($result);
        if($numrows>0){
            $showError = "email already exist";
        }
        else{
            if($pass == $cpass){
                $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$pass_hash', current_timestamp())";
                $result= mysqli_query($conn,$sql);
                if($result){
                    $showAlert = true;
                    header('location:/codingforum/index.php?signupsuccess=true');
                    exit();
                }
            }
            else{
                $showError="passwords does not matched try again";
            }
            
        }
        header('location:/codingforum/index.php?signupsuccess=false');

    }


?>