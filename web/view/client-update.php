<?php
    if($_SESSION['loggedin'] == FALSE){
        header('location: /acme/');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Acme | Client Update</title>
        <meta name="description" content="Update client information page">
        <?php
        include $_SERVER['DOCUMENT_ROOT'].'/acme/common/head.php';
        ?>
    </head>
    <body>
        <header>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/header.php';
            ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
             <div id="login-form">
                <h1>Update Account Information</h1>
                <?php
                if (isset($message)) {
                 echo $message;
                }
                ?>
                <h2>Update Personal Information </h2>
                <form method="post" action="/acme/accounts/index.php">
                    First Name <br>
                    <input name="clientFirstname"  type="text" placeholder="First Name" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}elseif(isset($clientFirst)){echo "value='$clientFirst'";}?> required>
                    Last Name <br>
                    <input name="clientLastname" type="text" placeholder="Last Name" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}elseif(isset($clientLast)){echo "value='$clientLast'";}?> required>
                    Email Address <br>
                    <input name="clientEmail"  type="email" placeholder="email address" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}elseif(isset($email)){echo "value='$email'";}?> required>
                    <input type="submit" name="submit" class="submitBtn" value ="Update">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="updateClient">
                    <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                </form>
                <h2 class="formy">Update Password </h2>
                <p>Submitting this form will change your current password.</p>
                <form action="/acme/accounts/index.php" method="post">
                    <span >Password</span> <br>
                    <input name="clientPassword" type="password"  placeholder="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    <input type="submit" name="submit" class=" submitBtn" value ="Update">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="updatePass">
                    <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                </form>
            </div>
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>