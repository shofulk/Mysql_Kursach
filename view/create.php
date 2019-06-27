<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- <style>
        ul{
            font-size: 24px;
        }
    </style> -->
</head>
<body>
<ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="./create.php">Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./searchFirm.php">Search Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./searchContact.php">Search Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./createContract.php">Contact</a>
            </li>
        </ul>
        <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Director</th>
                <th>Address</th>
            </tr>
            <p>
                <h3>Enter the data you want to create</h3>
            </p>
            <tr><form id="form-firm">
                <div class="form-group">
                    <th><input type="text" name="field-name" id="" placeholder="Name" value="Name" class="form-control"></th>
                    <th><input type="text" name="field-director" id="" placeholder="Director" value="Director" class="form-control"></th>
                    <th><input type="text" name="field-address" id="" placeholder="Address" value="Address" class="form-control"></th>
                    <th><button class='btn btn-outline-secondary' id="create-firm" onclick="createF()">Create</button></th>
                </div>
                </form>
            </tr>
        </table>
        <table class="table table-striped">
	        <tr>
		        <th>Name</th>
                <th>Director</th>
                <th>Address</th>
	        </tr>
    <?php
		require('../connection/connect.php');

		$query = "SELECT * FROM firm";
		$result = mysqli_query($conn, $query);
		echo "<p><h3>All Firms.</h3></p>";

		while($row = mysqli_fetch_array($result)){
            if($row['status'] == '1'){
            echo "<tr><form method=POST action=editFirm.php>
                    <div class=form-group>
					<td>".$row['name']."</td>
					<td>".$row['shef']."</td>
					<td>".$row['address']."</td>
					<td><button class='btn btn-outline-secondary'>View</button></td>
					<input type=hidden name=id value='".$row['id_firm']."'>
                    </div>
                    </form></tr>";
            }
        }	
	?>
</table>
</div>
</body>
</html>