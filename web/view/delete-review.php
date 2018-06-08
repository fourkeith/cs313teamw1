<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Delete Review | Acme</title>
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
            <h1>Delete This Review</h1>
            <p class="error">Are you sure you want to delete this review?</p>
            <form method="post" action="/acme/reviews/index.php">
                <p><span class="bold">Product:</span><?php echo ' '.$indReview['invName']; ?></p>
                <p><span class="bold">This product was reviewed:</span><?php echo ' '.$indReview['reviewDate']; ?></p>
                <textarea name="reviewText" placeholder="Enter review here" readonly><?php echo $indReview['reviewText']; ?></textarea><br>
                <input type="submit" name="submit" class="formInput" id="reviewButton" value ="Submit">
                <input type="hidden" name="action" value="delete">
                <input type='hidden' name='reviewId' value='<?php echo $reviewId?>'>
            </form>
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>