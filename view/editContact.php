<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <style>
        a{
            font-size: 24px;
        }
    </style>
</head>
<body>
	<a href="#" onclick="createContract()">exit</a>
	<?php
		require('../connection/connect.php');


		$query = "SELECT * FROM dogovor WHERE id_d=".$_POST['field_id'];
		$result = mysqli_query($conn, $query);

		$row = mysqli_fetch_array($result);

		?>

	<div class="container">
	<h3>Edit</h3>
	<p>Enter the data you want to change in the fields. </p>
	<form role='form' class="form form-horizontal" id="form-contract">
		<div class="form-group">	
                    <label for="id_firm" class='control-label col-md-3'>Firm</label>
					<div class="col-md-5">
                        <select class='custom-select col-25' id='inputGroupSelect04' name='id_firm'>
                                    <?php $query = "SELECT id_firm, CONCAT(name,' (', shef, ')') as 'name', status FROM firm";
                                    $result = mysqli_query($conn, $query);
                                    while($r = mysqli_fetch_array($result)){
                                        if($r['status'] == '1'){
                                            if($r['id_firm'] == $row['id_firm']){
                                                echo "<option value='".$r['id_firm']."' selected>".$r['name']."</option>";
                                            }else{
                                                echo "<option value='".$r['id_firm']."'>".$r['name']."</option>";
                                            }
                                        }
                                    }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label for="number" class='control-label col-md-3'>Number</label>
					<div class="col-md-5">
					    <input class='form-control' type="text"  name="number" placeholder="Number" value="<?php echo $row['numberd']?>" readonly>
					</div>
				</div>
                <div class="form-group">
					<label for="fname" class='control-label col-md-3'>Name</label>
					<div class="col-md-5">
					<input class='form-control' type="text"  name="fname" placeholder="Name" value="<?php echo $row['named']?>">
					</div>
				</div>
				<div class=form-group>
					<label class='control-label col-md-3 'for="sum">Sum</label>
					<div class="col-md-5">
					<input class="form-control" type="text" name="sum" placeholder="Sum" value="<?php echo $row['sumd']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5" for="start">Data Start</label>
					<div class="col-md-5">
					<input class="form-control" type="date" name="start" placeholder="Start" value="<?php echo $row['datastart']?>">
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-md-5" for="finish">Data Finish</label>
					<div class="col-md-5">
					<input class="form-control" type="date" name="finish" placeholder="Finish" value="<?php echo $row['datafinish']?>">
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row['id_d']?>">
		</form>

        <button class='btn btn-outline-secondary' onclick="editContact()">Edit</button>
        <button class='btn btn-outline-secondary' onclick="deleteContact()">Delete</button>
		<button class="btn btn-info" formaction="./createStage.php" form="form-contract" formmethod="POST">Stages</button>
		<button class="btn btn-info" data-toggle="modal" data-target="#myModal"></button>

		<!-- MODAL WINDOW STAGES -->
		

		<!-- MODAL WINDOW  -->
		<div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-tittle">Refill</h4>
                    <button class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
					<form class="form form-horizontal" id="form-refill">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" readonly value="<?php echo $row['named']?>">
						</div>
						<div class="form-group">
							<label for="avans">Avans</label>
							<input type="text" name="avans" class="form-control" readonly value="<?php echo $row['avans']?>">
						</div>
						<div class="form-group">
							<label for="sum">Sum</label>
							<input type="text" name="sum" class="form-control" readonly value="<?php echo $row['sumd']?>">
						</div>
						<div class="form-group">
							<label for="val">Vulue</label>
							<input type="number" name="val" class="form-control" required>
						</div>
						<input type="hidden" name="id" value="<?php echo $row['id_d']?>">
						<button class="btn btn-outline-secondary" onclick="refill()" form="form-refill">Go</button>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
            </div>
        </div>
	</div>
	
</body>
</html>