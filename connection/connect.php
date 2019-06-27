<?php
    $conn = mysqli_connect('localhost', 'root', '', 'firmadovogor');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>