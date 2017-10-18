<?php


include './back-end/CRUD.php';


$crud = new CRUD();


$crud->delete_data($_GET['id']);

echo "<a href='./select.php'>List Data</a>";
