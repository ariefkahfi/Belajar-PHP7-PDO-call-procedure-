<?php

include './back-end/CRUD.php';


$crud = new CRUD();


$id = $_POST['id'];
$nama = $_POST['nama'];

try{
    $crud->update_data($id, $nama);
    echo "update data berhasil";
} catch (PDOException $ex) {
    echo $ex;
}




