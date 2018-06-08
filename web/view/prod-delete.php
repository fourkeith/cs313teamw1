<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>ACME | <?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></title>
        <meta name="description" content="Page to update product information">
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
            <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>
                <?php if (isset($message)) {
                    echo $message;
                }
                ?>
            
            <p>Confirm Product Deletion. The delete is permanent.</p>
                <form method="post" action="/acme/products/index.php">
                    Product<br>   
                    <input name="invName"  type="text" placeholder="Product Name" <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?> required>
                    Description<br>  
                    <textarea name="invDescription" placeholder="Product Description" required><?php if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; } ?></textarea>
                    <input type="submit" name="submit" class="formInput" id="submitBtn" value ="Delete Product">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="deleteProd">
                    <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
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

