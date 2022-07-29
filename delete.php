<?php
$showSuccesAlert = false;

require './partials/_db.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
}

$sql = "delete from `datas` where ID = '$id'";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Error");
}

header("location: display.php");

?>