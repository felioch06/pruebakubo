<?php
    class Cart extends DB{
        
        //Consultas
        public function searchProducts(){
                
            try{
                    
                $str = parent::conectar()->prepare("SELECT * FROM products WHERE id_product IN ()");
                $str->execute();
                return $str->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die('Search Products error'.$e->getMessage());
            }
        }
    }
?>