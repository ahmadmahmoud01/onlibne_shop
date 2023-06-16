<?php

session_start();

require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';
require_once '../classes/validation/Validator.php';
use helpers\Image;
use validation\Validator;

if(!isset($_SESSION['id'])) {

    header('location: index.php');

}

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_FILES['img'];

    //validation
    $v = new Validator;
    $v->rules('name', $name, ['required', 'string', 'max:100']);
    $v->rules('description', $description, ['required', 'string']);
    $v->rules('price', $price, ['required', 'numeric']);
    $v->rules('file', $img, ['required-image', 'image']);
    $errors = $v->errors;

    //if data is valid
    if($errors == []) {

        $image = new Image($img);

        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'img' => $image->new_name
        ];

        $prod = new Product;
        $result = $prod->store($data);

        if($result == true) {
           
            //upload image
            $image->upload();

            header('location:../index.php');

        // if error storing in database
        } else {
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../add.php');
        }


    }else {
        $_SESSION['errors'] = $errors;
        header('location:../add.php');
    }

} else {

    header('location:../add.php');

}