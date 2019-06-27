<!DOCTYPE html5>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contract</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="./create.php">Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./searchFirm.php">Search Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./searchContact.php">Search Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Contact</a>
            </li>
        </ul>
        <div class="container-fluid">
        <table class="table table-striped">
            <tr>
                <th>Id_Firm</th>
                <th>Number</th>
                <th>Name</th>
                <th>Sum</th>
                <th>Data Start</th>
                <th>Data Finish</th>
                <th>Prepayment</th>
            </tr>
            <p>
                <h3>Enter the data you want to create</h3>
            </p>
            <tr>
                <div class="form-group ">
                    <form id="form-contact">
                        <div class="input-group">
                            <th><select class="custom-select col-13" id="inputGroupSelect04" name="id_firm">
                                <?php
                                    require('../connection/connect.php');
                                    $query = "SELECT id_firm, CONCAT(name,' (', shef,')') as 'name', status FROM firm";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){
                                        if($row['status'] == '1'){
                                            echo "<option value='".$row['id_firm']."'>".$row['name']."</option>";
                                        }
                                    }

                                    $q = "SELECT MAX(numberd) as 'num' FROM dogovor";
                                    $val = mysqli_query($conn, $q);
                                    $row = mysqli_fetch_array($val);
                                ?>
                            </select></th>
                            <th><input type="number" name="field_number" id="" placeholder="Numder" value=<?php echo "'".++$row['num']."'"?> class="form-control" readonly required></th>
                            <th><input type="text" name="field_name" id="" placeholder="Name" value="Name" class="form-control" required></th>
                            <th><input type="number" name="field_sum" id="" placeholder="Sum" class="form-control col-8" required></th>
                            <th><input type="date" name="field_tart" class="form-control" required></th>
                            <th><input type="date" name="field_finish" placeholder="data-finish"id="" class="form-control" required></th>
                            <th><input type="number" name="field_prepayment" placeholder="prepayment" id="" class="form-control col-8" required></th>   
                            <th><button class='btn btn-outline-secondary' onclick="createC()">Create</button></th>
                        </div>
                    </form>
                </div>
            </tr>
        </table>
        
        <table class="table table-striped">
	        <tr>
		        <th>Id_Firm</th>
                <th>Number</th>
                <th>Name</th>
                <th>Sum</th>
                <th>Data Start</th>
                <th>Data Finish</th>
                <th>Prepayment</th>
	        </tr>
    <?php
        
		$q = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans
        FROM dogovor
        LEFT JOIN firm ON dogovor.id_firm = firm.id_firm
        WHERE firm.status = 1";
        $res = mysqli_query($conn, $q);
		echo "<p><h3>Enter the data you want to change in the fields.</h3></p>";

		while($r = mysqli_fetch_array($res)){
            echo "<tr><form method=POST action='../view/editContact.php'>
                    <div class='input-group'>
                        <td>";
                                $query = "SELECT id_firm, CONCAT(name,' (', shef,')') as 'name', status FROM firm ";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)){
                                        if($row['id_firm'] == $r['id_firm']){
                                            echo $row['name'];
                                        }
                                }
                        echo "</td>
                        <td>".$r['numberd']."</td>
                        <td>".$r['named']."</td>
                        <td>".$r['sumd']."</td>
                        <td>".$r['datastart']."</td>
                        <td>".$r['datafinish']."</td>
                        <td>".$r['avans']."</td>   
                        <td><button class='btn btn-outline-secondary'>View</button></td>
                        <td><input type=hidden name='field_id' value='".$r['id_d']."';
                    </div>
                    </form></tr>";
            }
        	
	?>
</table>
</div>
</body>
</html>