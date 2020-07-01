<?php
    class Product extends DB{

        //Consultas
        public function searchProducts(){
            try{
                $str = parent::conectar()->prepare("SELECT * FROM products");
                $str->execute();
                return $str->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die('Search Products error'.$e->getMessage());
            }
        }

        public function searchCaregory(){
            try{
                $str = parent::conectar()->prepare("SELECT * FROM category");
                $str->execute();
                return $str->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die('Search Products error'.$e->getMessage());
            }
        }

        public function searchProductWithCategory($fk_category){
            try{
                $str = parent::conectar()->prepare("SELECT * FROM products WHERE fk_category = ?");
                $str->bindParam(1, $fk_category, PDO::PARAM_INT);
                $str->execute();
                return $str->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die('Search Products error'.$e->getMessage());
            }
        }

        

    
    }
?>