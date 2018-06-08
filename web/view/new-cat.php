<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>ACME|Add Category</title>
        <meta name="description" content="">
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
                <h1>Add Category</h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <p> Add a new category of products below.</p>
               <form action="/acme/products/index.php" method="post">
                    <input name="categoryName"  type="text" placeholder="Category" required>
                    <input type="submit" name="submit" class="formInput" id="submitBtn" value ="Submit">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="addCategory">
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