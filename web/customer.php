<?php 

    try {
        $dbUrl = getenv('DATABASE_URL');
    
        $dbopts = parse_url($dbUrl);
    
        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = ltrim($dbopts["path"],'/');
    
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $ex) {
        echo "Error connecting to Database. Details: $ex";
        die();
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Customer Database</title>
</head>

<body>
    <?php  include 'nav.php'; ?>

    <?php

        $statement = $db->prepare("SELECT customerid, firstname, lastname, address, zip, phone FROM customer");
        $statement ->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
        
        echo '<p>';
        echo $row['customerid'] . ' ' . $row['firstname'] . ' '; 
        echo $row['lastname'] . ' ' . $row['address'] . ' ';
        echo $row['zip'] . ' ' . $row['phone'];
        echo '<p>';

    }

    $statement = $db->prepare("SELECT carid, make, model, year, vin, licenseplate, odometer FROM cars");
        $statement ->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
        
        echo '<p>';
        echo $row['carid'] . ' ' . $row['make'] . ' '; 
        echo $row['model'] . ' ' . $row['year'] . ' ';
        echo $row['vin'] . ' ' . $row['licenseplate'];
        echo $row['odometer'];
        echo '<p>';

    }

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

</body>

</html>
