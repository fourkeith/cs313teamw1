<?php 

    $db = include 'dbaccess.php';

//    $query = ("INSERT INTO Customer (firstname, lastname, address, zip, phone)" . 
//              "VALUES ($_POST[fname], $_POST[lname], $_POST[addre], $_POST[zip]," .
//              "$_POST[phone])")

    $result = pg_insert($db, 'Customer', $query);
    if ($result) {
        echo "Database Insert successful\n";
    }
    else {
        echo "Database Insert unsuccessful\n";
    }

?>
