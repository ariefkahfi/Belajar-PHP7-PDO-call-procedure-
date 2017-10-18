<?php
include './back-end/CRUD.php';






if(!isset($_POST['nama'])){
    echo "
      Form belum diisi <br/>
      <a href='./insert.php'></a>
    ";
}else{
    $crud = new CRUD();
    $crud->insert_data($_POST['nama']);
    echo "
      query OK 
      <a href='./Welcome.php'>Form data</a>
    ";
}


