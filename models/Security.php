<?php

//llave de encrypt
define('KEY_ENCRYPT','tPvDytgc7WzVeqL9cYGM32wVZkbNWe3eU8v4sB699gUdwwcy7JWKmhgcejQ29vREtWkJpfH9necvm2DhmrEykLAqF22smHVEg6YvXjeVphfz9wukLXuVzEVRxM8u7TJdBkjauqVGhN63UaXwXh49MPQUdNZahzdvJ8v3n3kfs38b3WhR5bBGCgdFF4sztfUNdescSph9fga84jAJ6MfyTjPaX6AgWkF2aHPTVWS2PELHzWgvA9E54j6S2gKNs2rc'); 

    class Security extends DB{

        private static $key=KEY_ENCRYPT;

        //validar si la sesión está  no iniciada y redireccionar a la pantalla iniciar sesion
        public function validar_sesion(){
            if(empty($_SESSION['nombres']) || is_null($_SESSION['nombres'])){
                header("location:?class=Login&view=login");
            }
        }

        //validar si la sesión está iniciada y redireccionar a la pantalla home
        public function validar_sesion_login(){
            if(@!empty($_SESSION['nombres']) || @!is_null($_SESSION['nombres'])){
                header("location:?class=Usuarios&view=banda");
            }
        }
        

        /* Encriptar */
        public static function encrypt($string) {
            $result = '';
            for($i=0; $i<strlen($string); $i++) {
               $char = substr($string, $i, 1);
               $keychar = substr(self::$key, ($i % strlen(self::$key))-1, 1);
               $char = chr(ord($char)+ord($keychar));
               $result.=$char;	
            }
            return base64_encode($result);
         }
            /* desencriptar */
         public static function decrypt($string) {
            $result = '';
            $string = base64_decode($string);
            for($i=0; $i<strlen($string); $i++) {
               $char = substr($string, $i, 1);
               $keychar = substr(self::$key, ($i % strlen(self::$key))-1, 1);
               $char = chr(ord($char)-ord($keychar));
               $result.=$char;
            }
            return $result;
         }

         public function tokenUrl(){
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $input_length = strlen($permitted_chars);
            $random_string = '';
            for($i = 0; $i < 16; $i++) {
                $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            return $random_string;
         }

         //restriccion de carácteres
         public static function int($t)
	   {
	      $tc = preg_replace('([^0-9])', '', $t);
	      $tc = stripcslashes(htmlspecialchars(addslashes(trim($tc))));
	      return $tc;
	   }
	   public static function string($t)
	   {
	      $tc = preg_replace('([^0-9a-zA-Z@ ])', '', $t);
	      $tc = stripcslashes(htmlspecialchars(addslashes(trim($tc))));
	      return $tc;
	   }
	   public static function email($t)
	   {
	      $tc = preg_replace('([^0-9a-zA-Z@.])', '', $t);
	      $tc = stripcslashes(htmlspecialchars(addslashes(trim($tc))));
	      return $tc;
	   }
    }
?>