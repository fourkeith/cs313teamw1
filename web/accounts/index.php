<?php

/* 
 * I am Accounts Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../web/library/connections.php';
// Get the acme model for use as needed
require_once '../web/model/acme-model.php';
// Get the accounts model
require_once '../web/model/accounts-model.php';
// Get the functions library
require_once '../web/library/functions.php';

require_once '../web/model/reviews-model.php';

// Get the array of categories
$categories = getCategories();

//var_dump($categories);
//exit;

//call nav function to build nav
$navList = createNav($categories);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input (INPUT_GET, 'action');
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
    $cookieFirstname = $_SESSION['clientData']['clientFirstname'];
}elseif(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}else {
    $cookieFirstname = null;
}

switch ($action) {
    case 'registration':
        include '../web/view/registration.php';
        break;
    case 'login':
        include '../web/view/login.php';
        break;
    case 'register':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);      
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        
        //call function to test for existing email.
        $existingEmail = uniqueClient($clientEmail);
        
        //check for existing email address
        if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../web/view/login.php';
            exit;
        }
        
        
        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p class="notice">Please provide information for all empty form fields.</p>';
            include '../web/view/registration.php';
            exit; 
        }
        
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
            
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            
            $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('location: /accounts/');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../web/view/registration.php';
            exit;
        }
        break;
    case 'Login':
        // Filter and store the data
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        
        // Check for missing data
        if( empty($clientEmail) || empty($checkPassword)){
            $message = '<p>Please fill in all empty form fields.</p>';
            include '../web/view/login.php';
            exit; 
        }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
          $message = '<p class="notice">Please check your password and try again.</p>';
          include '../web/view/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
               
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        
//        print_r($clientData);
//        exit;
        
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        
        
        setcookie('firstname', '', (-3600), '/');
        
        $message = "<p class='success'> Hey there! You're logged in.</p>";
        
        
        // Send them to the admin view
        header('location: /acme/accounts/');
        break;
    case 'logout':
        setcookie('firstname', '', (-3600), '/');
        $_SESSION['loggedin'] = FALSE;
        session_destroy();
        header('location: /accounts/');
        break;
    case 'update':
        $clientInfo = getClient($_SESSION['clientData']['clientEmail']);
        if(count($clientInfo)<1){
            $message = 'Sorry, client information could not be found.';
        }
        $clientFirst = $_SESSION['clientData']['clientFirstname'];
        $clientLast = $_SESSION['clientData']['clientLastname'];
        $email = $_SESSION['clientData']['clientEmail'];
        include '../web/view/client-update.php';
        exit;      
        break;
    case 'updateClient':
        $clientInfo = getClient($_SESSION['clientData']['clientEmail']);

        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        
        $clientEmail = checkEmail($clientEmail);
        
        if($clientEmail != $_SESSION['clientData']['clientEmail']){
            //call function to test for existing email.
            $existingEmail = uniqueClient($clientEmail);   
            //check for existing email address
            if($existingEmail){
                $message = '<p class="notice">That email address already exists.</p>';
                include '../web/view/client-update.php';
                exit;
            }
        }

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)|| empty($clientId)){
            $message = '<p class="error">Please provide information for all empty form fields.</p>';
            include '../web/view/client-update.php';
            exit; 
        }
        
         //Send the data to the model
        $accountUpdateResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);
        
        $clientData = getClient($clientEmail);
        $_SESSION['clientData'] = $clientData;
        
        // Check and report the result
        if($accountUpdateResult === 1){
            $message = "<p class='success'>Your account has been updated.</p>";
            include '../web/view/admin.php';
            exit;
        } else {
            $message = "<p>Sorry but the update failed. Please try again.</p>";
            include '../web/view/admin.php';
            exit;
        }
        break;
    case 'updatePass':
        // Filter and store the data;
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);      
        $checkPassword = checkPassword($clientPassword);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

        
        // Check for missing data
        if(empty($checkPassword)|| empty($clientId)){
            $message = '<p class="notice">Please provide a new password.</p>';
            include '../web/view/client-update.php';
            exit; 
        }
        
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        // Send the data to the model
        $passwordOutcome = updatePassword($hashedPassword, $clientId);
        
        // Check and report the result
        if($passwordOutcome === 1){
            $message = "<p class='success'>Your password was successfuly updated.</p>";
            include '../web/view/admin.php';
            exit;
        } else {
            $message = "<p class='notice'>Your password was not successfully updated. Please try again.</p>";
            include '../web/view/client-update.php';
            exit;
        }
        break;
    default:
        $clientReviews = getClientReviews($_SESSION['clientData']['clientId']);
        
        if(count($clientReviews)){
            $buildClientReviews = buildClientReviews($clientReviews);
        }else {
            $buildClientReviews = "<p>You have not made any reviews</p>";
        }
        include '../web/view/admin.php';
        break;
}
