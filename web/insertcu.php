<?php 

    $db = include 'dbaccess.php';

    $result = pg_insert($db, 'post_log', $_POST);
    if ($result) {
        echo "Database Insert successful\n";
    }
    else {
        echo "Database Insert unsuccessful\n";
    }

?>
