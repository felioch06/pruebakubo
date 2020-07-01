<?php
    class ProductsController extends Product{
        public function index(){
            $title = 'Productos';
            require_once('views/products.php');
        }

        
    }
?>