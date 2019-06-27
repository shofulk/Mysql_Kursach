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
        h3{
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="./create.php">Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Search Firm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./searchContact.php">Search Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./createContract.php">Contact</a>
            </li>
        </ul>
    <h3>Search by the first letter</h3>
    <form method="POST">
    <div class="input-group">
        <select class="custom-select col-3" id="inputGroupSelect04" aria-label="Example select with button addon" name="Name[]">
        <?php
            require('../connection/connect.php');

            $query = "SELECT DISTINCT Left(name, 1) as 'name' FROM firm";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){
                if($row['name'] == $select){
                    echo "<option value='".$row['name']."' 'selected'>".$row['name']."</option>";
                }else{
                    echo "<option value='".$row['name']."'>".$row['name']."</option>";
                }
            }

        ?>
            </select>
            <div class='input-group-append'>
                <button class='btn btn-outline-secondary' type='submit' name='submit'>Enter</button>
            </div>
        </div>
    </form>
    <?php
        // session_start();
        // session_stop();
        if(isset($_POST['submit'])){
            foreach ($_POST['Name'] as $select)
            {
                $q = "SELECT * FROM firm WHERE Left(name, 1) = '".$select."'";
                echo "You have selected :" .$select; 
            }
            echo "
                <table class='table table-striped'>
                <tr>
                    <th>Name</th>
                    <th>Director</th>
                    <th>Address</th>
                </tr>";

             $res = mysqli_query($conn, $q);
             if(!$res){
                 echo "OK";
             }
            while($r = mysqli_fetch_array($res)){
                if($r['status'] == '1'){
                    echo "
                        <tr><form method=POST>
                            <div class=form-group>
                                <td>".$r['name']."</td>
                                <td>".$r['shef']."</td>
                                <td>".$r['address']."</td>
                                <td><button class='btn btn-outline-secondary' formaction='editFirm.php'>View</button></td>
                                <td><button class='btn btn-outline-secondary' formaction='viewContact.php'>Contact</button></td>
                                <td><input type=hidden name='id' value='".$r['id_firm']."'></td>
                            </div>
                            </form></tr>";
                }
            }
        }
    ?>
    
</body>
</html>