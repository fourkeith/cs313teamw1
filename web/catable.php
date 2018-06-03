<?php

$statement = $db->prepare("SELECT carid, make, model, year, vin, licenseplate, odometer FROM cars");
        $statement ->execute();
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {            
            echo '<p>';
            echo $row['carid'] . ' ' . $row['make'] . ' '; 
            echo $row['model'] . ' ' . $row['year'] . ' ';
            echo $row['vin'] . ' ' . $row['licenseplate'];
            echo $row['odometer'];
            echo '<p>';
    
        }

?>
