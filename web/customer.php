<!DOCTYPE html>
<html>

<head>
<title>Customer Database</title>
</head>

<body>
<?php  include 'nav.php'; ?>

<?php 
try
{
    $db = new PDO('postgres://ckrwvvgcjuonay:69b4b785cd636cf6822ebeaaa6f1364010bd051ffb6fa9dbf8ad960a06b260ec@ec2-50-19-232-205.compute-1.amazonaws.com:5432/d7degarv6j3a0b');
}
catch (PDOException $ex)
{
    echo 'ERROR: ' . $ex->getMessage();
}
?>
</body>

</html>
