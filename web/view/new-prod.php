<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
<?php
    // Build a category drop down using the $categories array
    $catList = '<select name="categoryId" required>';
    $catList .= "<option selected disabled value=''>Select one</option>";
    foreach ($categories as $category) {
        $catList .= "<option value='$category[categoryId]'";
    if(isset($categoryId)){
        if ($category['categoryId'] === $categoryId){
            $catList .= ' selected ';
        }
    }
        $catList .= "> $category[categoryName]</option>";
    }
    $catList .= '</select>';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ACME | Add a New Product</title>
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
            <h1>Add Product</h1>
                <?php if (isset($message)) {
                    echo $message;
                }
                ?>
                <form method="post" action="/acme/products/index.php">
                       
                    <input name="invName"  type="text" placeholder="Product Name" <?php if(isset($invName)){echo "value='$invName'";} ?> required>
                    <textarea name="invDescription" placeholder="Product Description" required><?php if(isset($invDescription)){echo "value='$invDescription'";} ?></textarea>
                    <input name="invImage" value="/acme/images/products/no-image.png"  type="text" class="formInput" placeholder="Product Image (include path to image)" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required>
                    <input name="invThumbnail" value="/acme/images/products/no-image.png" type="text" class="formInput" placeholder="Product Thumbnail (include path to Thumbnail)" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required>
                    <input name="invPrice" type="number" class="formInput" placeholder="Product Price" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required>
                    <input name="invStock" type="number" class="formInput" placeholder="Number in Stock" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required>
                    <input name="invSize" type="number" class="formInput" placeholder="Size (WxHxL in inches)" <?php if(isset($invSize)){echo "value='$invSize'";} ?> required>
                    <input name="invWeight" type="number" class="formInput" placeholder="Weight (lbs)" <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> required>
                    <input name="invLocation" type="text" class="formInput" placeholder="Location (City)" <?php if(isset($invLocation)){echo "value='$invLocation'";} ?> required>
                    <input name="invVendor" type="text" class="formInput" placeholder="Vendor Name" <?php if(isset($invVendor)){echo "value='$invVendor'";} ?> required>
                    <input name="invStyle" type="text" class="formInput" placeholder="Primary Material" <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> required>
                    <?php echo $catList; ?> 
                    <input type="submit" name="submit" class="formInput" id="submitBtn" value ="Submit">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="addProduct">
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

