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
}
catch (PDOException $ex) {
echo "Error connecting to Database. Details: $ex";
die();
}

}

?>

<!DOCTYPE html>
<html>

<head>
<title>Customer Database</title>
</head>

<body>
<?php  include 'nav.php'; ?>

$statement = $db->prepare("SELECT * FROM customer");
$statement ->execute;

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{

echo '<p>';
echo $row['customerid'] . ' ' . $row['firstname'] ' ' 
   . $row['lastname'] . ' ' . $row['address']
   . $row['zip'] . ' ' . $row['phone'];
echo '<p>';

}

</body>

</html>
