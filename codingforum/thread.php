<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>VDiscuss - CodersLife</title>
    <style>
    #bottom {
        min-height:100vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php 
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_description'];
            $thread_user_id = $row['thread_user_id'];
            
            // query for user table to find the user who posted a thread.
            $sql3 = "SELECT user_email FROM `users` WHERE srno = '$thread_user_id'";
            $result3 = mysqli_query($conn,$sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $posted_by = $row3['user_email'];
        }
    ?>
    <?php 
            // sql query for insert and display comment.
            $showAlert = false;
            $method = $_SERVER['REQUEST_METHOD'];
            if( $method=='POST'){
                $comment= $_POST["comment"];
                $comment = str_replace("<","&lt",$comment);
                $comment = str_replace(">","&gt",$comment);
                $srno = $_POST["srno"];
                $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$srno', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                $showAlert = true;
                if($showAlert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your comment has been added!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                        </div>'; 
                }
            }    
        ?>
    <div class="container my-3">
        <div class="jumbotron">
            <h4 class="display-4"><?php echo $title; ?></h4>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <strong>
                    <p>Posted by: <em><?php echo $posted_by; ?></em></p>
                </strong>
            </p>
        </div>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
        echo'
        <div class="container my-3">
            <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                <h3 class="py-2">Post a Comment</h3>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    <input type="hidden" name="srno" value="'.$_SESSION['srno'].'"> 
                </div>
                <button type="submit" class="btn btn-primary">post comment</button>
            </form>
        </div>';
        }
        else{
            echo '<h3 class="py-2">Post a Comment</h3>
            <div class="alert alert-info" role="alert">
            You must Sign In/Log In to use this message board.
            </div>';
            }
        ?>
        <div class="container my-3" id=bottom>
            <h3 class="py-2">Discussion</h3>
            <?php 
                $id = $_GET['threadid'];
                $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
                $result = mysqli_query($conn,$sql);
                $noResult = true;
                while($row = mysqli_fetch_assoc($result)){
                    $noResult = false;
                    $id = $row['comment_id'];
                    $content = $row['comment_content'];
                    $comment_time = $row['comment_time'];
                    // $comment_time= date("d-m-y");
                    $comment_by= $row['comment_by'];
                    $sql2 = "SELECT user_email from `users` where srno=' $comment_by'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '
                    <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="img/user.png" width="40rem" class="my-2" alt="Sample Image">
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <p class="fw-bold my-0">'.$row2['user_email'].' at '.$comment_time.'</p>
                        <p>'.$content.'</p>
                    </div>
                </div>
                    ';    
                }
                if($noResult){
                    echo '<div class="alert alert-info" role="alert">
                            Be the first user to comment
                        </div>';
                }
                ?>
        </div>
    </div>
    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> -->
</body>

</html>