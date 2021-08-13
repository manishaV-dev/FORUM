<?php

session_start();


echo '
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">           
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iFORUM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories    
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                    $sql = "SELECT category_name, category_id FROM `categories` LIMIT 4";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){

                    echo '<li><a class="dropdown-item" href="thread.php?catid=' .$row['category_id']. '">' . $row['category_name'] . '</a></li>';
                    }
                    echo '</ul>
        </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" tabindex="-1">Contact Us</a>
                    </li>
                </ul>
                div class="row mx-2">';
                
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
            echo '<form class="d-flex form-inline my-2 my-lg-0" action="search.php" method="get">
            <input class="form-control me-2 mx-0" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success mx-0 me-md-3" type="submit">Search</button>

            <span class="text-light mx-3 my-0"> Welcome ' . $_SESSION['email'] . ' </span>
            <a href="assest/_logout.php" class="btn btn-outline-success me-md-1 ml-2 mx-0 pt-2"> Logout </a>
        </form>';
        }
        else
        {
            echo '<form class="d-flex form-inline my-2 my-lg-0">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Search</button>
        </form>
        <button class="btn mx-2 btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in</button>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signinModal">Sign up</button>';
        }
                
           echo  '</div>
        </div>
    </nav>';

    include 'assest/_login.php';
    include 'assest/_signup.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']== "true"){
        // echo "Hello";

        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Your account is now created now you can log in.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']== "false")
    {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> Error while sign up.Please check Password or email.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }

    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']== "true"){


        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Your are successfully logged in.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']== "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> Invalid log in details.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }

    ?>