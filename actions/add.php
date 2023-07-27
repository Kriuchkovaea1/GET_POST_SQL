<?php
$connect = new mysqli('localhost', 'root', '', 'get_post_test');

$name = $_POST['name'];
$age = $_POST['age'];
$car = $_POST['car'];
$ice_cream = $_POST['ice_cream_id'];

mysqli_query($connect, query: "insert person (name, age, car, ice_cream_id) values ($name, $age, $car, $ice_cream)");
header('Location: /style.css/postTest.php');