<?php
$connect = new mysqli('localhost', 'root', '', 'get_post_test');

$person_id = $_GET['id'];
$name = $_GET['name'];
$age = $_GET['age'];
$car = $_GET['car'];
$ice_cream = $_GET['ice_cream'];

mysqli_query($connect, query: "UPDATE `person` SET `name` = '$name', `age` = '$age', `car` = '$car', 
                    `ice_cream_id` = '$ice_cream' WHERE `person_id` = $person_id");

header('Location: /style.css/postTest.php');