<?php

session_start();

require_once '../classes/Product.php';

if(!isset($_SESSION['id'])) {

    header('location: index.php');

}

$id = $_GET['id'];

$product = new Product;

// first delete image from folder
$my_prod = $product->getOne($id);

$prod_img = $my_prod['img'];

unlink('../images/' . $prod_img);

// second delete product
$product = $product->delete($id);


header('location:../index.php');


