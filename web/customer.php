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

    <div>
        <button onclick="customertable()">Customer Table</button>
    </div>

    <div>
        <button onclick="carstable()">Cars Table</button>
    </div>

    <div>
        <button onclick="worktable()">Work Table</button>
    </div>

    <?php

        function customertable() {
            include "cutable.php";
        }

        function carstable() {
            include "catable.php";
        }

        function worktable() {
            include "wtable.php";
        }

    ?>

</body>

</html>
