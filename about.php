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


    <div class="container my-4" id="container">
    <div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">About us</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><i class="fas fa-users-cog"></i></svg>
        </div>
        <div>
          <h3>Community</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id quaerat ipsa sint quos dicta magni fugit inventore a, 
              saepe repellendus, ducimus praesentium ratione culpa tempora eum consequuntur, assumenda aliquam quasi!</p>
        </div>
      </div>
      
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><i class="fas fa-people-carry"></i></svg>
        </div>
        <div>
          <h3>Help & Support</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id quaerat ipsa sint quos dicta magni fugit inventore a, 
              saepe repellendus, ducimus praesentium ratione culpa tempora eum consequuntur, assumenda aliquam quasi!</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><i class="fas fa-file-signature"></i></svg>
        </div>
        <div>
          <h3>Membership</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id quaerat ipsa sint quos dicta magni fugit inventore a, 
              saepe repellendus, ducimus praesentium ratione culpa tempora eum consequuntur, assumenda aliquam quasi!</p>
        </div>
        </div>
    </div>
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