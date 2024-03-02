
<!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>free shopping articles</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<br><br><br><br><br><br
<?php
require_once("connexion.php");
$article=$connexion->prepare('SELECT titre FROM article ORDER BY  id_article desc  ');
$panier=$connexion->query('SELECT * FROM genre');
$publier=$connexion->query('SELECT * FROM type_article');




?>

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>


                        <?php
                        if ($publier_article=$publier->fetch()){

                            $type_article=$connexion->prepare('select * from article where id_type=1');
                            $type_article->execute(array($publier_article['id_type']));
                            $article_type=$type_article->fetch();
                        }


                                        ?>


                        <?php echo $article_type['id_type'];?>


            <div class="latest-products">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        </div>

                        <?php while ($article_type= $article->fetch()){
                            $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                            $imagesResult = $images->execute(array($article_type['id_img']));
                            $image = $images->fetch();

                            ?>
                            <div class="col-md-3">
                                <div class="product-item">
                                    <?php echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='190'>";?>

                                    <div class="down-content">
                                        <?php?>
                                        <a href="#"><h4><?=$article_type['titre']?></h4></a>
                                        <h6><?=$article_type['prix']?><?php echo"FCFA";?></h6>
                                        <p><?=$article_type['etat']?></p>
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
            <?php?>
            <!-- Banner Ends Here -->
        </div>
    </div>
