<?php 

require_once 'inc/header.php';
require_once 'classes/Product.php';

if(!isset($_SESSION['id'])) {

    header('location: index.php');

}


?>  
    


<div class="container my-5">

    <?php if(isset($_SESSION['errors'])) { ?>
        <?php foreach($_SESSION['errors'] as $error) { ?>
            <p class="alert alert-danger"><?= $error ?></p>
        <?php } ?>
    <?php } ?>

    <?php unset($_SESSION['errors']); ?>

    <form action="handlers/handleAdd.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="name" class="form-control"  placeholder="Enter name">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" rows="3" placeholder="Enter description"></textarea>
        </div>
        <div class="form-group">
            <input type="number" name="price" class="form-control" placeholder="Enter price">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Image:</label>
            <input type="file" name="img" class="form-control-file">
        </div>

        
        
        <button type="submit" name="submit" class="btn btn-primary">Add</button><br><br>
    </form>
    <a href="index.php" class="btn btn-info">back</a>
                
                    
</div>


<?php include('inc/footer.php'); ?>



