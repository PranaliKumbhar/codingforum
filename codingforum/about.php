<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>VDiscuss-CodersLife</title>
</head>

<body>
<?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <div class="container mt-3" style="min-height:80vh;">
        <h3>About VDiscuss Coding Froums</h3>
        <p><b>VDiscuss</b> was formed to allow developers to freely share their knowledge, code and ideas. We believe that by opening your code to others, by teaching those who are learning, and by sharing our daily experiences we all become better programmers.</p>
        <p>We understand that no matter how advanced you are in your field, we were all beginners once. There's always something more to learn.</p>
        <p>VDiscuss is only for troubleshooting the OpenSource programming and developing fields,not the broad field for coomon matters. It is an email based problem solving service in which user can ask their technical queries by submitting it on the specified location under the particular category.</p>

        <h4>Guidelines :</h4>
        <p> For Submitting question, users have to follow the following guidelines:</p>
        <h5>Do this :</h5>
        <ul>
            <li>Use a strong password, Strong password should contain at least 8 characters letters, numbers and special characters.</li>
            <li>The user must post the query relating to programming and developing field.</li>
            <li>The user must post the problem under only the specified category and also mention it properly. For example: A question relating to Javascript must be asked in the section given in JavaScript page.</li>
            <li>Before asking the question, user must search the answer in the archive section it may be possible that users will get plenty number of answers on their qustions.</li>
        </ul>
        
        <h5>Don't do this :</h5>
        <ul>
            <li>The user should not violate the rules of the guideline. In the case of volating the rules, user will get no response</li>
            <li>The user who post comments in slang and filthy language will be blocked.</li>
            <li>Users must not ask question in the comment section because comments section is only for posting the comments.Same question section is only for question, not for comments</li>
        </ul>



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