<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <style>
        a{
            font-size: 24px;
        }
    </style>
</head>
<body>
	<a href="#" onclick="createFirm()">exit</a>
	<?php
		require('../connection/connect.php');


		$query = "SELECT * FROM firm WHERE id_firm=".$_POST['id'];
		$result = mysqli_query($conn, $query);

		$row = mysqli_fetch_array($result);
		?>

	<div class="container">
	<h3>Edit</h3>
	<p>Enter the data you want to change in the fields. </p>
	<form role='form' class="form form-horizontal" id="form">
		<div class="form-group">	
					<label for="field-name" class='control-label col-md-3'>Name</label>
					<div class="col-md-5">
					<input class='form-control' type="text"  name="field-name" placeholder="Name" value="<?php echo $row['name']?>">
					</div>
				</div>
				<div class=form-group>
					<label class='control-label col-md-3 'for="field-shef">Director</label>
					<div class="col-md-5">
					<input class="form-control" type="text" name="field-shef" placeholder="Director" value="<?php echo $row['shef']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5" for="field-address">Address</label>
					<div class="col-md-5">
					<input class="form-control" type="text" name="field-address" placeholder="Address" value="<?php echo $row['address']?>"">
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row['id_firm']?>">
		</form>

        <button class='btn btn-outline-secondary' onclick="editFirm()">Edit</button>
        <button class='btn btn-outline-secondary' onclick="deleteFirm()">Delete</button>
	</div>
</body>
</html>