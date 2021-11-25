<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

    <title>VDiscuss - CodersLife</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <br><br><br>
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if( $method=='POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $message = $_POST['message'];

            $sql = "INSERT INTO `contactus` (`name`, `email`, `title`, `message`, `datetime`) VALUES ('$name', '$email', '$title', '$message', current_timestamp())";
            $result = mysqli_query($conn,$sql);
        }
    ?>
    <div class="container d-flex align-items-center ">
        <div class="col-md-3"></div>

        <div class="col-md-6 mb-4" id="contactus">
            <h2 class="text-center">Contact Us</h2>
            <br>
            <form action="contact.php" method="post" class="form">
            <input type="text" name="name" class="form-control input" placeholder="Enter Name" required><br>
            <input type="email" name="email" class="form-control input" placeholder="Enter Email" required> 
            <br>
            <input type="text" name="title" class="form-control input" placeholder="Enter Thread Title" required>
            <br>
            <textarea id="textarea" name="message" cols="60" rows="5" placeholder="Enter Message"></textarea>
            <br>
            <button class="btn btn-success my-3" type="submit">Submit</button>  
            </form>
        </div>
        <div class="col-md-3"></div>

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
    </script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> -->


</body>

</html>