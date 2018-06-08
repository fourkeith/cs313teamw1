<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>ACME Homepage</title>
        <meta name="description" content="Homepage for ACME">
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
        <nav id="home">
            <?php echo $navList; ?>
        </nav>
        <main >
            <div class="content">
                <h1>Welcome to Acme!</h1>
                <div class="banner">
                    <img src="images/site/rocketfeature.jpg" alt="Wiley Coyote On a Rocket" class="rocket">
                    <ul>
                        <li><h2>Acme Rocket</h2></li>
                        <li>Quick lighting fuse</li>
                        <li>NHTSA approved seat belts</li>
                        <li>Mobile launch stand included</li>
                        <li><a href="/acme/cart/" title="Add To Cart"><img id="actionbtn" alt="Add to cart button" src="images/site/iwantit.gif"></a></li>
                    </ul>
                </div>
                <div id="reviews">
                    <h2>Acme Rocket Reviews</h2>
                    <ul>
                        <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
                        <li>"That thing was fast!" (4/5)</li>
                        <li>"Talk about fast delivery." (5/5)</li>
                        <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
                        <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
                    </ul>
                </div>
                <div>
                    <div class="main-recipes">
                        <h2>Featured Recipes</h2>
                        <div class="recipes">
                            <div class="ind-recipe"> 
                                <div class="pictures"><img src="images/recipes/bbqsand.jpg" alt="Roadrunner Pulled BBQ Sandwich"></div>
                                <p><a href="#" title="Roadrunner BBQ">Pulled Roadrunner BBQ</a></p>
                            </div>
                            <div class="ind-recipe">
                                <div class="pictures"><img src="images/recipes/potpie.jpg" alt="Roadrunner Pot Pie"></div>
                                <p><a href="#" title="Roadrunner Potpie">Roadrunner Pot Pie</a></p>
                            </div>    
                            <div class="ind-recipe">
                                <div class="pictures"><img src="images/recipes/soup.jpg" alt="Roadrunner Soup"></div>
                                <p><a href="#" title="Roadrunner Soup">Roadrunner Soup</a></p>
                            </div>
                            <div class="ind-recipe"> 
                                <div class="pictures"><img src="images/recipes/taco.jpg" alt="Roadrunner Tacos"></div>
                                <p><a href="#" title="Roadrunner Tacos">Roadrunner Tacos</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </main>
        <footer>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/acme/common/footer.php';
            ?>
        </footer>
    </body>
</html>