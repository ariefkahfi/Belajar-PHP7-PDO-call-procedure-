<?php



class Koneksi {
    
    public static function panggilKoneksi($user , $pass){
        return new PDO("mysql:host=localhost;dbname=b_procedure4",$user,$pass);
    }
}
