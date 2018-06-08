<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
<?php
    /// Build the categories option list
    $catList = '<select name="categoryId">';
    $catList .= "<option disabled value=''>Select one</option>";
    foreach ($categories as $category) {
        $catList .= "<option value='$category[categoryId]'";
            if(isset($categoryId)){
                if($category['categoryId'] === $categoryId){
                    $catList .= ' selected ';
                }
            } elseif(isset($prodInfo['categoryId'])){
                if($category['categoryId'] === $prodInfo['categoryId']){
                    $catList .= ' selected ';
                }     
            }
            $catList .= ">$category[categoryName]</option>";
        }
    $catList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>ACME |  <?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></title>
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
            <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>
            <?php if (isset($message)) {
                echo $message;
            }
            ?>
                <form method="post" action="/acme/products/index.php">
                    Product<br>   
                    <input name="invName"  type="text" placeholder="Product Name" <?php if(isset($invName)){echo "value='$invName'";} elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?> required>
                    Description<br>  
                    <textarea name="invDescription" placeholder="Product Description" required><?php if(isset($invDescription)){echo "$invDescription";} elseif(isset($prodInfo['invDescription'])) {echo "$prodInfo[invDescription]"; }?></textarea>
                    Image<br>  
                    <input name="invImage" type="text" class="formInput" <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; }?> required>
                    Thumbnail<br>  
                    <input name="invThumbnail" type="text" class="formInput"  <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }?> required>
                    Price<br>  
                    <input name="invPrice" type="number" class="formInput" placeholder="Product Price" <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; }?> required>
                    Quantity In Stock<br>  
                    <input name="invStock" type="number" class="formInput" placeholder="Number in Stock" <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; }?> required>
                    Size (WxHxL in inches)<br>  
                    <input name="invSize" type="number" class="formInput" placeholder="Size (WxHxL in inches)" <?php if(isset($invSize)){echo "value='$invSize'";} elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; }?> required>
                    Weight (lbs)<br>
                    <input name="invWeight" type="number" class="formInput" placeholder="Weight (lbs)" <?php if(isset($invWeight)){echo "value='$invWeight'";} elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; }?> required>
                    Location (City)<br>
                    <input name="invLocation" type="text" class="formInput" placeholder="Location (City)" <?php if(isset($invLocation)){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }?> required>
                    Vendor<br>
                    <input name="invVendor" type="text" class="formInput" placeholder="Vendor Name" <?php if(isset($invVendor)){echo "value='$invVendor'";} elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }?> required>
                    Primary Material<br>
                    <input name="invStyle" type="text" class="formInput" placeholder="Primary Material" <?php if(isset($invStyle)){echo "value='$invStyle'";} elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; }?> required>
                    Category<br>
                    <?php echo $catList; ?> 
                    <input type="submit" name="submit" class="formInput" id="submitBtn" value ="Update Product">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="updateProd">
                    <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
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

