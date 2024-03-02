
<?php
require_once ("views/connexion.php");
$ide = $connexion->query('SELECT * FROM article where id_type=1 ORDER BY  id_article desc ');

?>




</div>
<!-- Page Content -->
<div class="banniere">
<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Vendre et achetez avec<em>free</em> shopping</h4>
                            <p>free shopping vous aide a vendre les articles dont vous ne voulez plus utilisez</p>
                        </div>
                        <div class="col-md-4">
                            <a href="ajouter_article.php" class="filled-button">commencez une vente</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Banner Starts Here -->
<div class="latest-products">
<div class="col-md-4">
                            <a href="femme.php" class="filled-button">genre</a>
                    </div>
    <div class="container">
    <h1>vetements</h1>
        <div class="row">
            <div class="col-md-12">
            </div>

            <?php while ($articles = $ide->fetch()){
                $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                $imagesResult = $images->execute(array($articles['id_img']));
                $image = $images->fetch();

                ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <a href="php/info_article.php?id_article=<?= $articles['id_article']?>"> <?php  echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='190'>"; ?></a>
                        <div class="down-content">
                            <a href="#"><h4><?=$articles['titre']?></h4></a>
                            <h6><?=$articles['prix']?><?php echo"FCFA";?></h6>
                            <p><?=$articles['etat']?></p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (24)</span>
                        </div>
                    </div>
                </div>

            <?php    }?>
<!-- Banner Ends Here -->
        </div>
    </div>

    <?php
    $second = $connexion->query('SELECT * FROM article where id_type=2 ORDER BY  id_article desc ');
?>
</div>
<!-- Banner Starts Here -->
<div class="latest-products">
    <div class="container">
    <h1>chaussures</h1>
        <div class="row">
        <h1></h1>
            <div class="col-md-12">
            </div>

            <?php while ($articles = $second->fetch()){
                $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                $imagesResult = $images->execute(array($articles['id_img']));
                $image = $images->fetch();

                ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <a href="php/info_article.php?id_article=<?= $articles['id_article']?>"> <?php  echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='190'>"; ?></a>
                        <div class="down-content">
                            <a href="#"><h4><?=$articles['titre']?></h4></a>
                            <h6><?=$articles['prix']?><?php echo"FCFA";?></h6>
                            <p><?=$articles['etat']?></p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (24)</span>
                        </div>
                    </div>
                </div>

            <?php    }?>
<!-- Banner Ends Here -->
        </div>
    </div>


    <?php
    $requete = $connexion->query('SELECT * FROM type_article');
    $third= $connexion->query('SELECT * FROM article where id_type=3 ORDER BY  id_article desc ');
?>
</div>
<!-- Banner Starts Here -->
<div class="latest-products">
    <div class="container">
    <h1>scolaire</h1>
        <div class="row">
        <h1></h1>
            <div class="col-md-12">
            </div>

            <?php while ($articles = $third->fetch()){
                $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                $imagesResult = $images->execute(array($articles['id_img']));
                $image = $images->fetch();

                ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <a href="php/info_article.php?id_article=<?= $articles['id_article']?>"> <?php  echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='190'>"; ?></a>
                        <div class="down-content">
                            <a href="#"><h4><?=$articles['titre']?></h4></a>
                            <h6><?=$articles['prix']?><?php echo"FCFA";?></h6>
                            <p><?=$articles['etat']?></p>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (24)</span>
                        </div>
                    </div>
                </div>

            <?php    }?>

        </div>
    </div>



