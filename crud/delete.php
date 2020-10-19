<?php

	include_once('inc/connection.php');
	$id = $_GET['id'];
	$conn->query("delete from model_info where id = $id");
	header('location:index.php');

?>