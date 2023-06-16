<?php 

include 'inc/header.php'; 
require_once 'classes/Product.php';

$product = new Product;

$products = $product->getAll();



?>  
    


<div class="container my-5">
    <div class="row">

        <?php if($products !== []) { ?>

            <?php foreach($products as $product) { ?>

                <div class="col-lg-4 mb-5">
                    <div class="card">
                    <img src="images/<?php echo $product['img']; ?>" class="card-img-top" height="300px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="text-muted">$ <?= $product['price'] ?></p>
                        <p class="card-text"><?= substr($product['description'], 0, 30) . ' ...' ?></p>
                        <a href="show.php?id=<?= $product['id'] ?>" class="btn btn-primary">Show</a>
                        <?php if(isset($_SESSION['id'])) { ?>
                            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="handlers/handleDelete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                        <?php } ?>

                    </div>
                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>
            <p>No products found</p>
        <?php } ?>

    </div>

</div>


<?php include('inc/footer.php'); ?>



