<?php 



require_once 'inc/header.php';
require_once 'classes/Admin.php';

if(isset($_SESSION['id'])) {

    header('location: index.php');
    
}


?>  
    


<div class="container my-5 text-center">

    <h3 class="my-5">Login Page</h3>

    <?php if(isset($_SESSION['errors'])) { ?>
        <div class="alert alert-danger w-50 m-auto">
            <?php foreach($_SESSION['errors'] as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
        
    <?php } ?>

    <?php unset($_SESSION['errors']); ?>

    <form action="handlers/handleLogin.php" method="post">
        <div class="form-group text-center my-3">
            <input type="email" name="email" class="form-control w-50 m-auto"  placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control w-50 m-auto" placeholder="Enter password">
        </div>

        
        
        <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
    </form>
                
                    
</div>


<?php include('inc/footer.php'); ?>



