<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome to iFORUM</title>

    <style>
         #container{
             min-height: 433px;
         }

        </style>

  

</head>


<body>

    <?php include 'assest/_dbconnect.php';?>
    <?php include 'assest/_navbar.php';?>

    
    <?php

        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE theard_id=$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            
            $thread_user = $row['thread_user']; 
            //query the users table to find out the name of user who post the question
            $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_name'];

        }
    ?>

    <!-- for post a comment -->

    <?php

        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if($method== 'POST')
        {
            // insert thread in comments database
            $comment = $_POST['comment'];
            //this is use to replace < to &lt; comments if any user type this.if any user use < it considered as a tag. 
            //jaisa tag likhenge waisa hi show krega either it is js or html but in database it replace <> to &LTGT;
            //to avoid attackers  
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace("<", "&gt;", $comment);
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments` (`comment_cont`, `thread_id`, `comment_by`, `comment_time`)
                    VALUES ('$comment', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thank You!</strong> Your comment has been added!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

        }


    ?>


    <div class="container my-4 bg-light">

        <div class="jumbotron">
            <h1 class="display-4 py-2"> <?php echo $title; ?> </h1>
            <p class="lead">  <?php echo $desc; ?> </p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledge with each other. All the forums are categorized by
                topics. Please post your questions or messages in the appropriate forum. If a topic is posted in a forum
                that is not appropriate for the question, the staff has the right to move that topic to another better
                suited forum.</p>
            <p class="lead">
                Posted by : <em> <?php echo  "$posted_by"; ?> </em>
            </p>
        </div>
    </div>

        <!-- form -->
        <!-- when login and post a comments its show their name and also update in table -->
        <!-- <input type="hidden" name="sno"> -->
    <?php
    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container">
    <form action="'. $_SERVER["REQUEST_URI"]. '" method="post">
        <div class="mb-3 ">
        <h2 class="text-center pb-2 border-bottom">Post a comment</h2>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Type your comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <input type="hidden" name="sno" value=" ' . $_SESSION["sno"] .' ">
        </div>
        <button type="submit" class="btn btn-success">Post</button>
        </form>
    </div>';
    }
    else
    {
        echo ' <div class="container">
        <h2 class="text-center bg-secondary">Post a comment</h2>
        <p class="lead"> <b>You are not logged in. To post a comment you have to log in first.</b></p>
        </div> ';
    }
    ?>    

    <div class="container my-4" id="container">
        <h2 class="text-center pb-2 border-bottom">Discussion</h2>
    
    
    <?php

        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_cont'];
        $comment_time = $row['comment_time'];
        $thread_user = $row['comment_by'];
        $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        
        echo '<div class="media my-4">
        <span><i class="fas fa-user"></i></span>
        <div class="media-body mx-4">
        <p class="fw my-0 text-end"> Comment by:- <em>'. $row2['user_name'] .' </em> at ' . $comment_time . ' </p>
            ' . $content . '
        </div>
    </div>';

}

        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container my-4 bg-light">
                <p class="display-4">NO RESULTS FOUND</p>
                <p class="lead">Be the first person to answer.</p>
            </div>
        </div>';
}
?>
    </div>


    <?php include 'assest/_footer.php';?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>