<?php

session_start();

require_once '../classes/Product.php';
require_once '../classes/validation/Validator.php';
use validation\Validator;

if(!isset($_SESSION['id'])) {

    header('location: index.php');

}

$id = $_GET['id'];

$product = new Product;

$product = $product->getOne($id);

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //validation
    $v = new Validator;
    $v->rules('name', $name, ['required', 'string', 'max:100']);
    $v->rules('description', $description, ['required', 'string']);
    $v->rules('price', $price, ['required', 'numeric']);
    $errors = $v->errors;

    //if data is valid
    if($errors == false) {

        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ];

        $prod = new Product;
        $result = $prod->update($id, $data);

        

        if($result == true) {
            
            header('location:../show.php?id=' . $id);

        } else {

            $_SESSION['errors'] = ['error storing in database'];
            header('location:../edit.php?id=' . $id );
            
        }


    }else {
        
        $_SESSION['errors'] = $errors;
        header('location:../edit.php?id=' . $id);
    }

} else {
    header('location:../edit.php?id=' . $id);

}
