<?php
	include_once('inc/connection.php');
	$id = $_GET['id'];
	$data = $conn->query("select * from model_info where id = $id");
	if(isset($_POST['submit'])){
		$model_name = $_POST['model_name'];
		$date = $_POST['date'];
		$price = $_POST['price'];
		if(empty($model_name) || empty($date) || empty($price)){
			$error = "Field can not empty";
		}
		else{
			$conn->query("update model_info set model_name ='$model_name',publish_date = '$date',price = $price where id = $id");
			header('location:index.php');
			$msg = "data is updated successfully";
			setcookie(msg, $msg, time()+2);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="container mt-5">
		<form action="" method="post" class="w-50 m-auto">
			<?php 
				while($dt = $data->fetch_assoc()){?>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="model_name" name="model_name" value="<?php echo $dt['model_name']?>">
			</div>
			<div class="form-group">
				<input type="date" class="form-control" name="date" value="<?php echo $dt['publish_date']?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="enter price" name="price"value="<?php echo $dt['price']?>">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success"name="submit" value="update">
			</div>
			<?php }?>
		</form>
	</div>


	






	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
</body>
</html>
