<?php
    require('../connection/connectionPDO.php');
    
    function query($sql, $array){
        global $dbh;
        try{
            $stmt = $dbh -> prepare($sql);
            $stmt -> execute($array);

            echo "success";
        } catch (PDOException $exception) {
            echo $exception->getMessage( ) . "<br />";
        } 
    } 
    

    if($_POST["type"] == 1){

        $shef = trim($_POST["shef"]);
        $address = trim($_POST["address"]);   
        $data = trim($_POST["data"]); 

        $q = "INSERT INTO firm(name, shef, address) VALUES(?, ?, ?)";
        $array = array($name, $shef, $address);
        
        query($q, $array);
    }
    if($_POST["type"] == 2){

        $shef = trim($_POST["shef"]);
        $address = trim($_POST["address"]); 
        $id_firm = trim($_POST["id_firm"]);
        $data = trim($_POST["data"]); 

        $q = "UPDATE firm set name=?, shef=?, address=? WHERE id_firm=?";
        $array = array($name, $shef, $address, $id);
        
        query($q, $array);
    }
    if($_POST["type"] == 3){

        $id_firm = trim($_POST["id_firm"]);

        $q = "UPDATE firm set status=? WHERE id_firm=?";
        $array = array(0, $id);
        
        query($q, $array);
    }
    if($_POST["type"] == 4){

        $id_firm = trim($_POST["id_firm"]);
        $number = trim($_POST["number"]);
        $sum = trim($_POST["sum"]);
        $dataStart = trim($_POST["start"]);
        $dataFinish = trim($_POST["finish"]);
        $prepayment = trim($_POST["avans"]);
        $name = trim($_POST["name"]);

        $q = "INSERT INTO dogovor(id_firm, numberd, named, sumd, datastart, datafinish, avans) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $array = array($id_firm, $number, $name, $sum, $dataStart, $dataFinish, 0);

        query($q, $array);
    }
    if($_POST["type"] == 5){

        $id_firm = trim($_POST["id_firm"]);
        $number = trim($_POST["number"]);
        $sum = trim($_POST["sum"]);
        $dataStart = trim($_POST["start"]);
        $dataFinish = trim($_POST["finish"]);
        $prepayment = trim($_POST["avans"]);
        $name = trim($_POST["name"]);
        $id = trim($_POST["id"]);

        $q = "UPDATE dogovor set id_firm = ?, numberd = ?, named = ?, sumd = ?, datastart = ?, datafinish = ? WHERE id_d = ?";

        $array = array($id_firm, $number, $name, $sum, $dataStart, $dataFinish, $id);
         
        query($q, $array);
    }
    if($_POST["type"] == 6){

        $id = trim($_POST["id"]);

        $q = "INSERT INTO archive(id_dogovor, status, data) values(?, 2, current_timestamp)";

        $array = array($id);

        query($q, $array);

    }
    if($_POST["type"] == 7){

        $id = trim($_POST["id"]);
        $data = trim($_POST["data"]);
        $number = trim($_POST["number"]);
        $sum = trim($_POST["sum"]);
        $finish = trim($_POST["finish"]);

        $q = "INSERT INTO stages(id_dogovor, data, sum, number, finish) values(?, ?, ?, ?, ?)";

        $array = array($id, $data, $sum, $number, $finish);
        query($q, $array);
    }
    if($_POST["type"] == 8){

        $id = trim($_POST["id"]);
        $value = trim($_POST["val"]);

        $q = "UPDATE dogovor SET avans = avans + ? WHERE id_d = ?";

        $array = array($value, $id);
        query($q, $array);

    }
    
    
?>