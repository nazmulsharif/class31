<?php 
	include_once('inc/connection.php');
	if(isset($_POST['submit'])){
		$model_name = $_POST['model_name'];
		$date = $_POST['date'];
		$price = $_POST['price'];
		if(empty($model_name) || empty($date) || empty($price)){
			$error = "Field can not empty";
		}
		else{
			$conn->query("INSERT INTO model_info(publish_date, model_name, price) VALUES ('$date','$model_name', $price)");
		}
	}

	$data = $conn->query("Select * from model_info");


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
			<div class="form-group">
				<input type="text" class="form-control" placeholder="model_name" name="model_name">
			</div>
			<div class="form-group">
				<input type="date" class="form-control" name="date">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="enter price" name="price">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success"name="submit" value="add">
			</div>
		</form>


		<div class="table">
			<?php
				if(isset($_COOKIE['msg'])){
					echo "<h5 class='alert alert-success'>".$_COOKIE['msg']."</h5>";
				}
				
			?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Sl</th>
						<th>Model Name</th>
						<th>Price</th>
						<th>Published date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i=1;
						while($dt= $data->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $dt['model_name']?></td>
							<td><?php echo $dt['price']?></td>
							<td><?php echo $dt['publish_date']?></td>
							<td>
								<a href="edit.php?id= <?php echo $dt['id'];?>" class="btn btn-primary">edit</a>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $dt['id']?>">
						  delete
						</button>
							</td>
						</tr>
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="delete<?php echo $dt['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete this item</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						       	<h5>Are You sure?</h5>
						      </div>
						      <div class="modal-footer">
						      	<a href="delete.php?id=<?php echo $dt['id'];?>" class="btn btn-danger">Delete</a>
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						       
						      </div>
						    </div>
						  </div>
						</div>

					<?php }?>
					
					
				</tbody>
			</table>
		</div>
	</div>


	






	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
</body>
</html>
