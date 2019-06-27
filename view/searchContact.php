<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Search Contact</title>
    <style>
    </style>
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
                <a class="nav-link active" href="#">Search Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./createContract.php">Contact</a>
            </li>
        </ul>
    <div class="form-group">
        <form method="POST">
                <fieldset>
                    <legend>Search for Data</legend>
                    <div class="row">
                        <div class="col-2"><input type="date" name="datastart" class="form-control"></div>
                        <div class="col-2"><input type="date" name="datafinish" class="form-control"></div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Search for Sum</legend>
                    <div class="row">
                        <div class="col-2"><input type="number" name="sumOn"  class="form-control" placeholder="sum"></div>
                        <div class="col-2"><input type="number" name="sumTo" class="form-control" placeholder="sum"></div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Search for Name</legend>
                    <div class="row">
                        <div class="col-4"><input type="text" name="name" class="form-control" placeholder="Name"></div>
                    </div>
                </fieldset>
                <br>
                <button type="submit" name="submit-search" class='btn btn-outline-secondary'>Search</button>
        </form>
    </div>

    <?php

    require('../connection/connectionPDO.php');

    $dataStart = trim($_POST['datastart']);
    $dataFinish = trim($_POST['datafinish']);
    $sumOn = trim($_POST['sumOn']);
    $sumTo = trim($_POST['sumTo']);
    $name = trim($_POST['name']);

    $q = "";
    $array = array();



    function search($q, $array){
            $query = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans
              FROM dogovor
              LEFT JOIN firm ON dogovor.id_firm = firm.id_firm
              WHERE firm.status = 1 ".$q;
        
        global $dbh;
        try{
            $stmt = $dbh -> prepare($query);
            $stmt -> execute($array);
            echo $q;

            while($row = $stmt -> fetch()){
                echo "
                <tr><form method=POST action=editContact.php>
                    <div class=form-group>
                        <td>".$row['id_firm']."</td>
                        <td>".$row['numberd']."</td>
                        <td>".$row['named']."</td>
                        <td>".$row['sumd']."</td>
                        <td>".$row['datastart']."</td>
                        <td>".$row['datafinish']."</td>
                        <td>".$row['avans']."</td>
                        <td><input type=hidden name='field_id' value='".$row['id_d']."'>".$row['id_d']."</td>
                        <td><button class='btn btn-outline-secondary'>View</button></td>
                    </div>
                    </form>
                </tr>";
                
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage( ) . "<br />";
        }        
    }

    if(isset($_POST['submit-search'])){


        echo "<table class='table table-striped'>
                <tr>
                    <th>Id_Firm</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Sum</th>
                    <th>Data Start</th>
                    <th>Data Finish</th>
                    <th>Prepayment</th>
                </tr>";

        //         $q = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans
        //         FROM dogovor
        //         LEFT JOIN firm ON dogovor.id_firm = firm.id_firm
        //         WHERE firm.status = 1";
        
        
        
        
        if($dataStart and $dataFinish){
            $q = $q."AND datastart > ? AND datafinish < ?";

           $array[] = $dataStart;
           $array[] = $dataFinish;
        }
        if ($sumOn) {
            
            $q = $q." AND sumd > ?";

            $array[] = $sumOn;
        
        }if ($sumTo) {
            
            $q = $q." AND sumd < ?";
            
            $array[] = $sumTo;
        }if($name){
            $q = $q." AND named = ?";

            $array[] = $name;
        }
        search($q, $array);
    }
    
        echo "</table>";
    
    // if(isset($_GET['view-contact'])){
    //     echo "You have selected: " .$_GET['id_firm']. " id firm";
    //     echo "<br><table class='table table-striped'>
    //             <tr>
    //                 <th>Id_Firm</th>
    //                 <th>Number</th>
    //                 <th>Name</th>
    //                 <th>Sum</th>
    //                 <th>Data Start</th>
    //                 <th>Data Finish</th>
    //                 <th>Prepayment</th>
    //             </tr>";

    //     $q = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans
    //     FROM dogovor WHERE dogovor.id_firm = ?";
    //     //  LEFT JOIN firm ON 
        
    //     //  WHERE firm.status = 1
        
    //     try{
    //         $stmt = $dbh -> prepare($q);
    //         $stmt -> execute(array($_GET['id_firm']));
    //         while($r = $stmt -> fetch()){
    //             echo "<tr>
    //                         <td>".$r['id_firm']."</td>
    //                         <td>".$r['numberd']."</td>
    //                         <td>".$r['named']."</td>
    //                         <td>".$r['sumd']."</td>
    //                         <td>".$r['datastart']."</td>
    //                         <td>".$r['datafinish']."</td>
    //                         <td>".$r['avans']."</td>
    //                     </tr>";
    //             }
    //     }catch (PDOException $exception) {
    //         echo $exception->getMessage() . "<br />";
    //     }
    //     echo "</table>";
    // }

?>
</body>
</html>