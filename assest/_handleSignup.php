
<?php
$showError = "false";
$showAlert = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include '_dbconnect.php';
    $name = $_POST['cname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['address'];

    // echo "$name";


    //check whether email exists

    $existSql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows>0)
    {
        $showError = "Email already exist.";
    }
    else
    {
        // echo "success";
        if(($pass == $cpass))
        {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            // var_dump($hash);
            
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `user_add`, `timestamp`) 
                    VALUES ('$name', '$email', '$hash', '$add', CURRENT_TIMESTAMP())";


            $result = mysqli_query($conn, $sql);
        
            if($result)
            {
                $showAlert = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }        
        }
        else
            {
            $showError = "Password do not match";
            
             }
        }
            header("Location: /forum/index.php?signupsuccess=false");
    }

?>