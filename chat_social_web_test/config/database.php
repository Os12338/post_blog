<?php
// connect database with website
$conn = mysqli_connect("localhost",'root','','blog');

if(!$conn){
    header('location:views/maintance.php');
}
?>