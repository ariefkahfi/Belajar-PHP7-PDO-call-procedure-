<?php

include 'Koneksi.php';

class CRUD {
  
    private $mysqlCon;
    
    
    public function __construct() {
        $this->mysqlCon = Koneksi::panggilKoneksi("arief", "arief");
    }

    public function insert_data($nama){
        
        $stmt = $this->mysqlCon->prepare("call p_insert (:nama)");
        
        $stmt->bindValue(":nama", $nama, PDO::PARAM_STR);
        
        $stmt->execute();
        
    }
    
    public function select_data(){
        $arr =  array();
        
        $stmt = $this->mysqlCon->query("call p_select()");
        
        while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($arr, $rs);
        }
        
        return $arr;
    }
    
    
    public function delete_data($id){
        $stmt = $this->mysqlCon->prepare("call p_delete (:id)");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
    
    public function update_data($id , $namaBaru){
        $stmt = $this->mysqlCon->prepare("call p_update(:id,:nama)");
        
        $stmt->bindValue(":id",$id);
        $stmt->bindValue(":nama", $namaBaru);
        $stmt->execute();
        
    }
    
}
