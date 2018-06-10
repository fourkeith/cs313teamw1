<?php

    $db = include 'dbaccess.php';

    $query = $db->prepare('SELECT * FROM Customer WHERE firstname=:fname AND lastname=:lname');
    $query->bindValue(':fname', $_POST['fname'], PDO::PARAM_STR);
    $query->bindValue(':lname', $_POST['lname'], PDO::PARAM_STR);
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>
