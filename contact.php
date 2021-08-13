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

        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method== 'POST')
        {
            // insert thread in thread database
            $name = $_POST['cname'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];
  
            $sql = "INSERT INTO `contact` (`name`, `email`, `message`)
                    VALUES ('$name', '$email', '$msg')";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Thank You for send us a message.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

        }


    ?>
    
    
    <!-- contact form -->
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-5 fw-bold lh-1 mb-3">Get in touch</h1>
        <p class="col-lg-10 fs-6">Please get in touch and our expert support team will response all your concern.</p>
        
        <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight"><span><i class="fas fa-phone-square-alt"></i></span>
         Give us a call <b>+91-9876543210</b>
        </div>
        <div class="p-2 bd-highlight"><span><i class="fas fa-envelope"></i></span>
        Send us an email <b> iforumhelp@gmail.com </b>
        </div>
  </div>
      </div>

      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" action="#" method="post">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter your full name">
            <label for="floatingInput">Full Name</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>

          <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="msg" name="msg"></textarea>
          <label for="floatingTextarea">Message</label>
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>
          <hr class="my-4">
        </form>
      </div>
    </div>
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