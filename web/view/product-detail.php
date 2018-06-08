<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php echo $productValue["invName"]; ?> | Acme, Inc.</title>
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
            <?php if (isset($message)) {
                echo $message;
            }
            ?>
            <?php echo $prodDisplay; ?>
            <?php if (isset($displayThumbs)) {
                echo $displayThumbs;
            }
            ?>
            <h2>Product Reviews</h2>
            <?php if (isset($reviews)){
                echo $reviews;
            }
            ?>
            <?php if (isset($displayReviews)){
                echo $displayReviews;
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