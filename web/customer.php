<!DOCTYPE html>
<html>

<head>
    <title>Customer Database</title>
</head>

<body>
    
    <?php  
        include 'nav.php';
    ?>

    <form action="search.php">
        <input type="text" name="fname" value="First Name"><br />
        <input type="text" name="lname" value="Last Name"><br />
        <input type="text" name="vin"   value="Vin"><br />
        <input type="submit" value="Submit">
    </form>

</body>

</html>
