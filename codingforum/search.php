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
    .container {
        min-height:100vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <!-- sql query for searching data in mysql -->
    <!-- alter table threads ADD FULLTEXT(`thread_title`,`thread_description`); -->
    <!-- Search Results-->
    <div class="container searchResult my-4">
        <div class="row">
            <h3 class="py-2">Search results for <em><?php echo $_GET['search'] ?></em></h3>
            <?php
                $searchResult = true;
                $search =  $_GET['search'];
                $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title,thread_description) AGAINST ('$search')";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $title = $row['thread_title'];
                    $desc = $row['thread_description'];
                    $thread_id = $row['thread_id'];
                    $searchResult = false;
                    $url= "thread.php?threadid=". $thread_id ;
                    echo'<div class="search">
                            <h5><a href="'.$url.'" class="text-dark text-decoration-none">'.$title.'</a></h5>
                            <p>'. $desc.'</p>
                        </div>';
                           
                }
                if($searchResult){
                    echo '
                    <div class="alert alert-info" role="alert">
                       <p class="lead">No search results found!</p>
                       <p class="lead">Suggestions: <ul>
                          <li>make sure that all words are spelled correctly</li>      
                          <li>try different keywords </li>      
                          <li>try more general keywords</li>      
                       </ul></p>
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