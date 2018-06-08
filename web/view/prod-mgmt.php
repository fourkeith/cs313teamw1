<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>ACME | Product Management</title>
        <meta name="description" content="Page to manage products including categories and new products">
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
            <h1>Product Management</h1>
            <p> Welcome to the product management page. Please choose an option below:</p>
            <a href="../products/index.php?action=categories"> Add a new Category </a> <br>  
            <a href="../products/index.php?action=inventory"> Add a new Product </a>
            <?php
            if (isset($message)) {
             echo $message;
            } if (isset($prodList)) {
             echo $prodList;
            }
            ?>
            
            
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>
<?php unset($_SESSION['message']); ?>