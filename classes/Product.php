<?php

require_once 'MySql.php';

class Product extends MySql{

    // get all products
    public function getAll() {

        $query = "SELECT * FROM products";


        $result = $this->connect()->query($query);
        $products = [];

        if($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()) {
                array_push($products, $rows);
            }
        }

        return $products;

    }

    // get specific product
    public function getOne($id) {

        $query = "SELECT * FROM products WHERE `id` = '$id' ";

        $result = $this->connect()->query($query);
        $product = null;

        if($result->num_rows == 1) {

            $product = $result->fetch_assoc();

        }

        return $product;

    }

    // insert into db
    public function store(array $data) {
        
        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['description'] = mysqli_real_escape_string($this->connect(), $data['description']);

        $query = "INSERT INTO products (`name`, `description`, `price`, `img`, `created_at`)
            VALUES ('{$data['name']}', 
            '{$data['description']}', 
            '{$data['price']}', 
            '{$data['img']}', 
            CURRENT_TIME())
            ";

        $result = $this->connect()->query($query);

        if($result == true) {
            return true;
        }
        
        return false;

    }

    // edit specific product
    public function update($id, array $data) {

        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['description'] = mysqli_real_escape_string($this->connect(), $data['description']);

        $query = "UPDATE products SET 
            `name` = '{$data['name']}',
            `description` = '{$data['description']}',
            `price` = '{$data['price']}'
            -- `img` = '{$data['img']}'
            WHERE id = '$id' ";

        $result = $this->connect()->query($query);

        if($result == true) {
            return true;
        }

        return false;

    }

    // delete specific product
    public function delete($id) {

        $query = "DELETE FROM products WHERE id = '$id' ";

        $result = $this->connect()->query($query);

        if($result == true) {
            return true;
        }
        
        return false;

    }

    // check for queries
    // public function queryCheck($query) {

    //     $result = $this->connect()->query($query);

    //     if($result == true) {
    //         return true;
    //     }
        
    //     return false;
    // }

    

}