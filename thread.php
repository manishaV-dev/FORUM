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

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_desc'];

        }
    ?>

    <?php

        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if($method== 'POST')
        {
            // insert thread in thread database
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            
            $th_title = str_replace("<", "&lt;", $th_title);
            $th_title = str_replace("<", "&gt;", $th_title);

            $th_desc = str_replace("<", "&lt;", $th_desc);
            $th_desc = str_replace("<", "&gt;", $th_desc);

            $sno = $_POST['sno'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat`, `thread_user`)
                    VALUES ('$th_title', '$th_desc', '$id', '$sno')";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your thread has been added! Please wait for response.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

        }


    ?>


    <div class="container my-4 bg-light">

        <div class="jumbotron">
            <h1 class="display-4 py-2">Welcome to <?php echo $catname; ?> Forum.</h1>
            <p class="lead">  <?php echo $catdesc; ?> </p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledge with each other. All the forums are categorized by
                topics. Please post your questions or messages in the appropriate forum. If a topic is posted in a forum
                that is not appropriate for the question, the staff has the right to move that topic to another better
                suited forum.</p>
        </div>
    </div>

    <div class="container my-4"  id="container">
        <h2 class="text-center pb-2 border-bottom">Browse Questions</h2>

        <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['theard_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user = $row['thread_user'];
            $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            

        echo '<div class="media my-4">
            <span><i class="fas fa-user"></i></span>
            <div class="media-body mx-4">
            <p class="fw my-0 text-end"> Asked by:- <em>'. $row2['user_name'] .' </em> at ' . $thread_time . ' </p>
                <h5 class="mt-0"> <a  class="text-dark"  href="threadlist.php?threadid=' . $id . '">' . $title . ' </a></h5>
                    ' . $desc . '
            </div>
        </div>';

    }
        // echo var_dump ($noResult);
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container my-4 bg-light">
              <p class="display-4">NO RESULTS FOUND</p>
              <p class="lead">Be the first person to ask question.</p>
            </div>
          </div>';
        }
    ?>

        <!-- form -->
        
        <!-- want to submit form on same page use request_uri instead of write path-->
       <?php 
       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
        <div class="mb-3 my-4">
        <h2 class="text-center pb-2 border-bottom my-4">Ask a Question</h2>
            <label for="thread" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
            <small class="form-text text-muted">Keep your title as short and crisp as possible</small>
        </div>
        <input type="hidden" name="sno" value=" ' . $_SESSION["sno"] .' ">
        <div class="mb-3">
            <label for="desc" class="form-label">Elaborate Your Problem</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>';
       }
       else
       {
        //    echo "You are not logged in";
        echo ' <div class="container bg-light">
        <h2 class="text-center bg-secondary">Ask a Question</h2>
        <p class="lead"> <b>You are not logged in. To ask a question you have to log in first.</b></p>
        </div> ';

       }
        
    ?>



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