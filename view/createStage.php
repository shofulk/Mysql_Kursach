<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <style>
        .row_2,
        .row_3,
        .row_4,
        .row_5{
            display: none;
        }

        .add_row{
            content: \271A;
            margin-left: 1200px;
            width: 90px;
            height: 50px;
        }
    </style>
</head>
<body>
    <a href="#" onclick="createContract()">exit</a>
    <table class="table">
					<tr>
						<th>Number</th>
						<th>Sum</th>
						<th>Start</th>
                        <th>Finish</th>
					</tr>
                    <?php 
                        require('../connection/connect.php');
                        $query = "SELECT * FROM stages WHERE id_dogovor = ".$_POST['id'];
                        $result = mysqli_query($conn, $query);

						while($m = mysqli_fetch_array($result)){
							echo "<tr><form name=form>
								<td><input class='form-control' type=number name=field-name placeholder=Имя value='".$m['number']."' readonly></td>
								<td><input class='form-control' type=text name=field-surname placeholder=Фамилия value='".$m['sum']."'></td>
                                <td><input class='form-control' type=date name=field-email placeholder=E-Mail value='".$m['data']."'></td>
                                <td><input class='form-control' type=date name=field-email placeholder=E-Mail value='".$m['finish']."'></td>
								<td><button class='btn btn-outline-secondary'>Edit</button>
								<input type=hidden name=id value='".$m['id_stages']."'>
							</form></tr>";
                        }
                        $q = "SELECT MAX(number) as 'max' FROM stages WHERE id_dogovor = ".$_POST['id'];
                        $r = mysqli_query($conn, $q);
                        $row = mysqli_fetch_array($r);
					?>
	</table>
    <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Add</button>
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-tittle">Stages</h4>
                    <button class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
					<table class="table">
                        <tr>
                            <th>Number</th>
                            <th>Sum</th>
                            <th>Start</th>
                            <th>Finish</th>
                        </tr>
                        <tr><form id="form_createSt">
                            <td><input class="form-control" type="number" name="number" value=<?php echo "'". ++$row['max']."'"?> readonly/></td>
                            <td><input class='form-control' type="text" name="sum" placeholder="Sum"></td>
							<td><input class='form-control' type="date" name="data" placeholder="Data"></td>
                            <td><input class="form-control" type="date" name="finish" placeholder="Finish"></td>
                            <input type="hidden" name="id_d" value=<?php echo "'". $_POST['id']."'"?>>
							<td><button class='btn btn-outline-secondary' onclick="addStage()">Add</button>
                        </form></tr>
					</table>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
            </div>
        </div>
	</div>

</body>
</html>