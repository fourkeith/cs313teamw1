<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Update Review | Acme</title>
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
            <h1>Update Review</h1>
            <?php if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/acme/reviews/index.php">
                <p>Update your review here.</p>
                <p><span class="bold">Product:</span><?php echo ' '.$indReview['invName']; ?></p>
                <p><span class="bold">This product was reviewed:</span><?php echo ' '.$indReview['reviewDate']; ?></p>
                <textarea name="reviewText" placeholder="Enter review here" required><?php if(isset($reviewText)) {echo $reviewText;} else{echo $indReview['reviewText'];}?></textarea><br>
                <input type="submit" name="submit" class="formInput" id="reviewButton" value ="Submit">
                <input type="hidden" name="action" value="updateRev">
                <input type='hidden' name='reviewId' value='<?php echo $reviewId; ?>'>
            </form>
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>