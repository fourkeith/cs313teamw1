<a href="index.php" title="Home"><img src="/images/site/logo.gif" alt="logo" ></a>
<div class="account">
    <?php if(isset($cookieFirstname)){
        echo "<span class='welcome'><a href='/accounts/index.php'>Welcome $cookieFirstname</a></span>";
    }?>
    
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
        echo '<a href="/accounts/index.php?action=logout" class="login" title="Logout">Logout</a>';
    } else {
        echo '<img src="/images/site/account.gif" alt="account folder icon"> <a href="/accounts/index.php?action=login" class="login" title="View Account">My Account</a>';
    }
    ?>
</div>
