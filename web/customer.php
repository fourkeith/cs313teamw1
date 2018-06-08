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
    <form action="search.php">
        <input type="text" name="fname" value="First Name"><br />
        <input type="text" name="lname" value="Last Name"><br />
        <input type="text" name="vin"   value="Vin"><br />
        <input type="submit" value="Submit">
    </form>
    <?php  include 'nav.php';

        

    ?>

</body>

</html>
