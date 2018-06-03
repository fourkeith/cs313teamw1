<?php

    $statement = $db->prepare("SELECT customerid, firstname, lastname, address, zip, phone FROM customer");
        $statement ->execute();
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            
            echo '<p>';
            echo $row['customerid'] . ' ' . $row['firstname'] . ' '; 
            echo $row['lastname'] . ' ' . $row['address'] . ' ';
            echo $row['zip'] . ' ' . $row['phone'];
            echo '<p>';
    
        }

?>
