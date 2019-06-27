<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="./create.php">Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./searchContact.php">Search Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./searchContact.php">Search Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./createContract.php">Contact</a>
            </li>
        </ul>
    <h3>Search by the first letter</h3>
    <table class='table table-striped'>
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

            require("../connection/connect.php");

            $q = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans, CONCAT(name,' (', shef,')') as 'name'
            FROM dogovor
            LEFT JOIN firm ON dogovor.id_firm = ".$_POST['id']."
            WHERE firm.status = 1 GROUP BY id_d";

            $res = mysqli_query($conn, $q);

            while($row = mysqli_fetch_array($res)){
                    echo "
                    <tr><form method=POST action=editContact.php>
                    <div class=form-group>
                        <td>".$row['name']."</td>
                        <td>".$row['numberd']."</td>
                        <td>".$row['named']."</td>
                        <td>".$row['sumd']."</td>
                        <td>".$row['datastart']."</td>
                        <td>".$row['datafinish']."</td>
                        <td>".$row['avans']."</td>
                        <td><input type=hidden name='field_id' value='".$row['id_d']."'></td>
                        <td><button class='btn btn-outline-secondary'>View</button></td>
                    </div>
                    </form>
                </tr>";
            }
        
    ?>
    
</body>
</html>