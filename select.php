<?php

include './back-end/CRUD.php';


$crud = new CRUD();

echo "<table border=2>";

echo "<tr>"
        . "<td>ID</td>"
        . "<td>Nama</td>"
        . "<td>Delete</td>"
        . "</tr>";

foreach ($crud->select_data() as $key => $value) {
    $id = $value['id'];
    $nama = $value['nama'];
    echo "<tr>"
            . "<td>$id</td>"
            . "<td>$nama</td>"
            . "<td><a href='./delete.php?id=$id'>Delete Person</a></td>"
            . "</tr>";
}

echo "</table>";






