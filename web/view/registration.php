<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Acme Account Registration</title>
        <meta name="description" content="Register for a new Account with Acme Products">
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
                <h1 id='registration'>Register For a New Account</h1>
                <p>All fields are required </p>
                
                <?php
                if (isset($message)) {
                 echo $message;
                }
?>
                <form method="post" action="/acme/accounts/index.php">
                    <input name="clientFirstname"  type="text" placeholder="First Name" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required>
                    <input name="clientLastname" type="text" placeholder="Last Name" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required>
                    <input name="clientEmail"  type="email" class="formInput" placeholder="email address" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required>
                    <input name="clientPassword" type="password" class="formInput" placeholder="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <span class="error">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    <input type="submit" name="submit" class="formInput" id="submitBtn" value ="register">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="register">
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