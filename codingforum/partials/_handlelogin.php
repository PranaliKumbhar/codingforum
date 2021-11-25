<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "_dbconnect.php";
    $user_email = $_POST['loginEmail'];
    $password = $_POST['loginPass'];

    $sql = "SELECT * FROM `users` WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
        if($numrows==1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['user_pass'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['srno'] = $row['srno'];
                $_SESSION['useremail'] = $user_email;
                echo "login:".$user_email;
                header('location:/codingforum/index.php?loginsuccess=true');
            }
            else{
            header('location:/codingforum/index.php?loginsuccess=false');
            }   
        }else{
        header('location:/codingforum/index.php');
    }

}

?>