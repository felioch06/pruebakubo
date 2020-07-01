<?php
    class CartsController extends Cart{
        public function index(){
            $title = 'Carrito';
            require_once('views/Carts.php');
        }
    }
?>