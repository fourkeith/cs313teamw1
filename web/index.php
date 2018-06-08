<?php

// Start Session
session_start();

// Create catagory array
$categories = getCategories();

// create nav
$navList = createNav($categories);

// check for cookie and get its value
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
    $cookieFirstname = $_SESSION['clientData']['clientFirstname'];
}elseif(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}else {
    $cookieFirstname = null;
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input (INPUT_GET, 'action');
}

switch ($action) {
    default:
        include 'home.php';
        break;
}

?>
