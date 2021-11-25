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
        min-height: 633px;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php 
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id = $id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];

        }
    ?>
    <?php 
            // sql query for inserting a thread into database table
            $showAlert = false;
            $method = $_SERVER['REQUEST_METHOD'];
            if( $method=='POST'){
                $th_title= $_POST["title"];
                $th_desc= $_POST["description"];

                $th_title = str_replace("<","&lt",$th_title);
                $th_title = str_replace(">","&gt",$th_title);

                $th_desc = str_replace("<","&lt", $th_desc);
                $th_desc = str_replace(">","&gt", $th_desc);
                $srno = $_POST['srno'];
                $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc' , '$id', '$srno', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                $showAlert = true;
                if($showAlert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your thread has been added wait for community to respond
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                        </div>'; 
                }
            }
            
        ?>

    <div class="container my-3">
        <div class="jumbotron">
            <h4 class="display-4">Welcome to <?php echo $catname; ?> Forums</h4>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
        <hr>
        <!-- form to post question by user -->
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
        echo'<div class="container my-3">
            <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <h3 class="py-2">Ask a Question</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1 class="form-label">Thread title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">keep your title as short as possible</div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Elaborate your concern</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            <input type="hidden" name="srno" value="'.$_SESSION['srno'].'">
        </div>
        <button type="submit" class="btn btn-primary">post thread</button>
        </form>
    </div>';
    }
    else{
    echo '<h3 class="py-2">Ask a Question</h3>
    <div class="alert alert-info" role="alert">
    You must Sign In/Log In to use this message board.
    </div>';
    }
    ?>
    <div class="container my-3" id=bottom>
        <h3 class="py-2">Browse Questions</h3>
        <?php 
                $id = $_GET['catid'];
                $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
                $result = mysqli_query($conn,$sql);
                $noResult = true;
                while($row = mysqli_fetch_assoc($result)){
                    $noResult = false;
                    $id = $row['thread_id'];
                    $title = $row['thread_title'];
                    $desc = $row['thread_description'];
                    $thread_time = $row['timestamp'];
                    // $thread_time= date("d-m-y");
                    $thread_user_id = $row['thread_user_id'];
                    $sql2 = "SELECT user_email from `users` where srno='$thread_user_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);

                    echo '<div class="media my-3">
                    <img class="mr-3" src="img/user.png" width="45rem" alt="Generic placeholder image">
                    <div class="media-body">
                    <p class="fw-bold my-0">'.$row2['user_email']. ' at ' .$thread_time.'</p>
                    <h5 class="mt-0"><a class="text-dark text-decoration-none" href="thread.php?threadid=' .$id. '">'.$title.'</a></h5>
                    <p class="my-2">'.$desc.'</p>
                </div>
                </div>';
                }
                if($noResult){
                    echo '<div class="alert alert-info" role="alert">
                            Be the first user to ask a question
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