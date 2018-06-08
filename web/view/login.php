<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Acme Account Login</title>
        <meta name="description" content="Login to your Acme Account">
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
                <h1>Sign In</h1>
                <?php
                if (isset($message)) {
                 echo $message;
                }
                ?>
                <form action="/acme/accounts/index.php" method="post">
                    <input name="clientEmail"  type="email" placeholder="email address" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required>
                    <input name="clientPassword" type="password"  placeholder="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    <input type="submit" name="submit" class="formInput" id="submitBtn" value ="login">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="Login">
                </form>
                <a href='/acme/accounts/index.php?action=registration'><p id='accountSignup'> No account? Sign up here.</p></a>
            </div>
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>