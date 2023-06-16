<?php 


require_once 'inc/header.php';
require_once 'classes/Product.php';

if(!isset($_SESSION['id'])) {

    header('location: index.php');

}

$id = $_GET['id'];

$prod = new Product;

$product = $prod->getOne($id);


?>  
    


<div class="container my-5">

    <?php if(isset($_SESSION['errors'])) { ?>
        <?php foreach($_SESSION['errors'] as $error) { ?>
            <p class="alert alert-danger"><?= $error ?></p>
        <?php } ?>
    <?php } ?>

    <?php unset($_SESSION['errors']); ?>

    <?php if($product !== null) { ?>

        <form action="handlers/handleEdit.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>"  placeholder="Enter name">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" rows="3" placeholder="Enter description"><?= $product['description'] ?></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" placeholder="Enter price">
            </div>

            
            <button type="submit" name="submit" class="btn btn-primary">update</button><br><br>
        </form>
        <a href="index.php" class="btn btn-info">back to home page</a>

    <?php } else { ?>

        <p>no product found</p>
        
    <?php }?>
                
                    
</div>


<?php include('inc/footer.php'); ?>



