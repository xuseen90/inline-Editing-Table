<?php
include('connection.php');

if (isset($_POST['id'])) {

    $value = $_POST['value'];
    $column = $_POST['column'];
    $id = $_POST['id']; 

    $sql = "UPDATE empoloyee SET $column = '$value' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "update Success";
    } else {
        echo "update Failure";
    }
}
