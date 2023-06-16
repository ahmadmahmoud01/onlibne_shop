<?php 

require_once 'inc/header.php';
require_once 'classes/Product.php';


$id = $_GET['id'];

$product = new Product;

$product = $product->getOne($id);



?>  
    


<div class="container my-5">
    <div class="row">

        <?php if($product !== null) { ?>


                <div class="col-lg-6">
                    <img src="images/<?php echo $product['img']; ?>" class="img-fluid">
                </div>
                <div class="col-lg-6">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="text-muted">$ <?= $product['price'] ?></p>
                        <p class="card-text"><?= $product['description'] ?></p>
                        <a href="index.php" class="btn btn-primary">Back</a>
                        <?php if(isset($_SESSION['id'])) { ?>
                            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="handlers/handleDelete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                    <?php } ?>
                    </div>
                </div>
                    
            </div>


        <?php } else { ?>
            <p>No product found</p>
        <?php } ?>

    </div>

</div>


<?php include('inc/footer.php'); ?>



