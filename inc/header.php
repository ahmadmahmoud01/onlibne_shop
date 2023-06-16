<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Online Shop</a>
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php if(isset($_SESSION['id'])) { ?>

                <li class="nav-item">
                    <a class="nav-link" href="add.php">Add product</a>
                </li>    

            <?php } ?>      
   
        </ul>

        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['id'])) { ?>

                    <a class="nav-item nav-link disabled"><?php echo $_SESSION['username']; ?></a>
                    <a class="nav-item nav-link" href="handlers/handleLogout.php">Logout</a>

            <?php } else { ?>  

                    <a class="nav-item nav-link" href="login.php">Login</a>
                    
            <?php } ?>    
        </div>
    </div>
    </nav>  