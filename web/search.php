<?php

    $db = include 'dbaccess.php';

    $query = $db->prepare('SELECT * FROM Customer WHERE firstname=:fname AND lastname=:lname');
    $query->bindValue(':fname', $_POST['fname'], PDO::PARAM_STR);
    $query->bindValue(':lname', $_POST['lname'], PDO::PARAM_STR);
    $query->execute();
    while ($rows = $query->fetchAll(PDO::FETCH_ASSOC)) {
        echo $row['firstname'] . ' ' . $row['lastname'] . ' ' . $row['address'] . ' ' . $row['zip'] . ' ' . $row['phone'] . '<br />';
    }

?>
