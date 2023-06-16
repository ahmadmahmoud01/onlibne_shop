<?php

require_once "classes/Product.php";

// $product = new Product;

// echo '<pre>';

// echo $product->delete(9);


// echo '</pre>';

if(isset($_POST['submit'])) {

    $img = $_FILES['img'];

    // echo '<pre>';
    // var_dump(pathinfo($img['name'])['filename'] . '.' .pathinfo($img['name'])['extension']);
    // var_dump(pathinfo($img['name'])['basename']);
    // echo '</pre>';

    $tmp_name = $img['tmp_name'];

    $extension = pathinfo($img['name'])['extension'];
    
    $new_name = uniqid() . '.' . $extension;

    move_uploaded_file($tmp_name, 'images/' . $new_name);

    // $ext = pathinfo($name)['extension']
    // $new_name = 


}

?>

<form action="test.php" method="post" enctype="multipart/form-data">

<input type="file" name="img">
<button type="submit" name="submit">Add</button>

</form>

