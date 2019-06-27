<?php
    require('../connection/connectionPDO.php');

    $id = trim($_POST['field_id']);
    $id_firm = trim($_POST['id_firm']);
    $name = trim($_POST['field-name']);
    $number = trim($_POST['field-number']);
    $sum = trim($_POST['field-sum']);
    $dataStart = trim($_POST['field-data-start']);
    $dataFinish = trim($_POST['field-data-finish']);
    $prepayment = trim($_POST['field-prepayment']);

    if(isset($_POST['submit_edit_contract'])){
        // $params = array(':id' => $id, ':id_firm' => $id_firm, ':numder' => $number, ':name' => $name, ':sum' => $sum, ':datastart' => $dataStart, ':datafinish' => $dataFinish, ':prepayment' => $prepayment);
        $sql = "UPDATE dogovor set id_firm = ?, numberd = ?, named = ?, sumd = ?, datastart = ?, datafinish = ?, avans = ? WHERE id_d = ?";


        try {
            $stmt = $dbh -> prepare($sql);
            // $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
            // $stmt -> bindParam(':id_firm', $id_firm, PDO::PARAM_STR);
            // $stmt -> bindParam(':numder', $number, PDO::PARAM_STR);
            // $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
            // $stmt -> bindParam(':sum', $sum, PDO::PARAM_STR);
            // $stmt -> bindParam(':datastart', $dataStart, PDO::PARAM_STR);
            // $stmt -> bindParam(':datafinish', $dataFinish, PDO::PARAM_STR);
            // $stmt -> bindParam(':prepayment', $prepayment, PDO::PARAM_STR);
            $stmt -> execute(array($id_firm, $number, $name, $sum, $dataStart, $dataFinish, $prepayment, $id));
            header('Location:createContract.php');

            echo $sql;
        } catch (PDOException $exception) {
            echo $exception->getMessage( ) . "<br />";
        }
    }
    if(isset($_POST['submit_delete_contract'])){
        try{
            $sql = "DELETE FROM dogovor WHERE id_d=:id";

            $stmt = $dbh -> prepare($sql);
            $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
            $stmt ->execute();

            header('Location:createContract.php');
        } catch(PDOException $exception){
            echo $exception->getMessage( ) . "<br />";
        }
    }
?>