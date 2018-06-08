<?php 
    if (!(isset($_SESSION['loggedin']))){
        header('location: /acme/index.php') ;
    }
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Acme | Admin</title>
        <meta name="description" content="Admin page for managing the ACME database">
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
            <h1> <?php 
            echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname'];
                ?>
            </h1>
            <?php if (isset($message)) {
                echo $message;
            }
            ?>
            <ul class="clientData">
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?> </li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?> </li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
            </ul> 
            <p><a href="../accounts/index.php?action=update">Update account Information</a></p>
            <h2>Your Product Reviews</h2>
            <?php if (isset($buildClientReviews)) {
                echo($buildClientReviews) ;
            }
            ?>
            <?php if ($_SESSION['clientData']['clientLevel'] > 1){
                echo "<h2 class='products'>Update Products</h2>"; 
                echo "<p class='products'>To manage products click the link below</p>";
                echo "<p class='products'><a href='/acme/products/'>Products Management</a></p>";
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