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
    <title>Search Result </title>
    <style>
         #container{
             min-height: 433px;
         }

        </style>
</head>


<body>

    <?php include 'assest/_dbconnect.php';?>
    <?php include 'assest/_navbar.php';?>
  

    <!-- for search -->

    <div class="container px-4 py-5 my-4" id="container">
    <h3 class="pb-2 border-bottom">Search results for <em> "<?php echo $_GET['query'] ?>"</em> </h3>

    
    <?php
        $noresults = true;
        $query = $_GET["query"];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) AGAINST ('$query')";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_id = $row['theard_id'];
        $url = "threadlist.php?threadid=".$thread_id;
        $noresults = false;
    
            echo ' <div class="result my-4">
                    <h4><a href="'. $url .'" class="text-dark"> ' . $title . ' </a></h4>
                    <p>'. $desc . '</p>
        </div> ';

        }

        if($noresults){
            echo ' <div class="jumbotron bg-light my-4">
            <div class="container">
            <p class="lead">No Results Found</p>
            <p class="lead">Suggestion:
                        <li>Make sure that all words are spelled correctly.
                        <li>Try different keywords.
                        <li>Try more general keywords.
        </div>
    </div> ';
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