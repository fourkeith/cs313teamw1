<?php

$statement = $db->prepare("SELECT workid, description, workdate, keytag FROM work");
        $statement ->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            
            echo '<p>';
            echo $row['workid'] . ' ' . $row['description'] . ' '; 
            echo $row['workdate'] . ' ' . $row['keytag'];
            echo '<p>';
    
        }

?>
