<?php if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Image Management | ACME</title>
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
            <h1>Image Management</h1>
                <h2>Add New Product Image</h2>
                    <?php
                        if (isset($message)) {
                        echo $message;
                        }
                    ?>
                <div>
                    <form action="/acme/uploads/" method="post" enctype="multipart/form-data">
                        <label for="invItem">Product</label><br>
                        <?php echo $prodSelect; ?><br><br>
                        <label>Upload Image:</label><br>
                        <input type="file" name="file1"><br>
                        <input type="submit" class="regbtn" value="Upload">
                        <input type="hidden" name="action" value="upload">
                    </form>
                </div>
            </div>
                <h2>Existing Images</h2>
                    <p class="success">If deleting an image, delete the thumbnail too and vice versa.</p>
                    <?php
                        if (isset($imageDisplay)) {
                            echo $imageDisplay;
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