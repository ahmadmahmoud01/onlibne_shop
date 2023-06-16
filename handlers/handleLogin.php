<?php

session_start();

require_once '../classes/Admin.php';
require_once '../classes/validation/Validator.php';
use validation\Validator;

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    //validation
    $v = new Validator;
    $v->rules('email', $email, ['required', 'string', 'max:100']);
    $v->rules('password', $password, ['required']);
    $errors = $v->errors;

    //if data is valid
    if($errors == []) {

        $admin = new Admin;

        $result = $admin->attempt($email, sha1($password));


        if($result !== null) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];

            header('location:../index.php');

        // if error storing in database
        } else {
            $_SESSION['errors'] = ['your credentials are not correct!'];
            header('location:../login.php');
        }


    }else {
        $_SESSION['errors'] = $errors;
        header('location:../login.php');
    }

} else {

    header('location:../login.php');

}