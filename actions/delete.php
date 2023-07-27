<?php
$connect = new mysqli('localhost', 'root', '', 'get_post_test');

$person_id = $_GET['id'];

mysqli_query($connect, query: "DELETE FROM `person` WHERE `person`.`person_id` = $person_id");

header('Location: /style.css/postTest.php');