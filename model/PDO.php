<?php

    require_once('../connection/connectionPDO.php');

    $dataStart = trim($_POST['datastart']);
    $dataFinish = trim($_POST['datafinish']);
    $sumOn = trim($_POST['sumOn']);
    $sumTo = trim($_POST['sumTo']);
    $id = trim($_POST['field_id']);
    $id_firm = trim($_POST['id_firm']);
    $name = trim($_POST['field-name']);
    $number = trim($_POST['field-number']);
    $sum = trim($_POST['field-sum']);
    $dataStart = trim($_POST['field-data-start']);
    $dataFinish = trim($_POST['field-data-finish']);
    $prepayment = trim($_POST['field-prepayment']);
    $shef = $_POST['field-director'];
    $address = $_POST['field-address'];

    function query($sql, $array, $location){
        global $dbh;
        try{
            $stmt = $dbh -> prepare($sql);
            $stmt -> execute($array);
            header($location);

            echo $sql;
        } catch (PDOException $exception) {
            echo $exception->getMessage( ) . "<br />";
        }
    }

    // $q = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans
    //     FROM dogovor
    //     LEFT JOIN firm ON dogovor.id_firm = firm.id_firm
    //     WHERE firm.status = 1";

    //     $stmt = $dbh -> prepare($q);
    //     $row = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    //     echo $row;

    if(isset($_POST['submit-search'])){
        if($sumOn and $sumTo){
            $q = "SELECT id_d, dogovor.id_firm, numberd, named, sumd, datastart, datafinish, avans
                FROM dogovor
                LEFT JOIN firm ON dogovor.id_firm = firm.id_firm
                WHERE firm.status = 1 AND (sumd > ? OR sumd < ?)";

            $array = array($sumOn, $sumTo);

            query($sql, $array, 'Location:../view/createContract.php');
        }
    }

    if(isset($_POST['submit_edit_contract'])){
        // $params = array(':id' => $id, ':id_firm' => $id_firm, ':numder' => $number, ':name' => $name, ':sum' => $sum, ':datastart' => $dataStart, ':datafinish' => $dataFinish, ':prepayment' => $prepayment);
        $sql = "UPDATE dogovor set id_firm = ?, numberd = ?, named = ?, sumd = ?, datastart = ?, datafinish = ?, avans = ? WHERE id_d = ?";

        $array = array($id_firm, $number, $name, $sum, $dataStart, $dataFinish, $prepayment, $id);
         
        query($sql, $array, 'Location:../view/createContract.php');

    }
    if(isset($_POST['submit_delete_contract'])){
        try{
            $sql = "INSERT INTO archive(id_dogovor, status, data) values(?, 2, current_timestamp)";

            $stmt = $dbh -> prepare($sql);
            $stmt ->execute(array($id));

            header('Location:/view/createContract.php');
        } catch(PDOException $exception){
            echo $exception->getMessage( ) . "<br />";
        }
    }
    if(isset($_POST['submit_create'])){
        $query = "INSERT INTO firm(name, shef, address) VALUES(?, ?, ?)";

        query($query, array($shef, $address, $address), "Location:../view/create.php");
        //echo $query;
    }
    if(isset($_POST['submit_Edit'])){
        $query = "UPDATE firm set name=? , shef=?, address=? WHERE id_firm=?";
        
        query($query, array($name, $shef, $address, $id_firm), "Location:../view/create.php");
    }
    if(isset($_POST['submit_Delete']))
    {
        $query = "UPDATE firm SET status='0' WHERE id_firm=?";

        query($query, array($id_firm), "Location:../view/create.php");
    }
    if(isset($_POST['submit_create_contract'])){
        if($start > $finish){
            $_SESSION['flag'] = TRUE;
            header('Location:../view/createContract.php');
        }else{
            $_SESSION['flag'] = false;
            $query = "INSERT INTO dogovor(id_firm, numberd, named, sumd, datastart, datafinish, avans) VALUES(?, 
                        ?, ?, ?, ?,
                        ?, ?)";

            query($query, array($id_firm, $number, $name, $sum, $dataStart, $dataFinish, $prepayment), "Location:../view/createContract.php");
            // echo $query;
        }          
    }

?>