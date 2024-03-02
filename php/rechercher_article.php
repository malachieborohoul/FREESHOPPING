
<?php
require_once("views/connexion.php");
session_start();
$article=$connexion->query('SELECT * from article order by id_article DESC');
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
    $recherche=htmlspecialchars($_GET['recherche']);
    $article=$connexion->query('SELECT *  from article where titre like "%'.$recherche.'%" order by id_article DESC');
    
}else
header("location: ../index.php");
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Free Shopping</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Faites votre choix
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Un catalogue garni
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> L'article n'attend que vous
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Commencez une vente
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Oui oui à Free Shopping là c'est comme ça
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Du style 
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> C'est Free Shopping ooo
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Allez y faites vous plaisir
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/" class="logo" alt=""></a>
                    <a class="navbar-brand"  href="index.php"><h2>FREE<em>SHOPPING</em></h2></a>
                    
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="../index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">A propos de nous</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php">Article</a></li>

                        

                        <li class="nav-item"><a class="nav-link" href="../login.php">Connexion</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                
                <!-- End Atribute Navigation -->
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->



<br><br><br><br>
<div class="catalogue">
    <ul>
        <?php if($article->rowCount() > 0){
            
           ?>
            <?php
            while($a=$article->fetch()){
               
                ?>
                
   

                 <div class="col-lg-3 col-md-6 special-grid top-featured">
                       
                 <a href="info_article.php?id_article=<?= $a['id_article']?>">
                        <?php
                   
                   $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                   $imagesResult = $images->execute(array($a['id_img']));
                   $image = $images->fetch();            
                    ?>   


                    <div class="products-single fix">
                        <div class="box-img-hover">
                            
                        <a href="php/info_article.php?id_article=<?= $articles['id_article']?>"> <?php  echo "<img src='http://localhost/FREESHOPPING/assets/images/".$image['img1']."' width='300' height=auto>"; ?></a>

                            
                  
                              
                        </div>
                        
                        <div class="why-text">
                            <h4><?=$a['titre']?></h4>
                            <h4><?=$a['etat']?></h4>
                            <h5> <?=$a['prix']?> <?php echo"FCFA";?></h5>
                        </div>
                    </div>
                </div>


                <?php }?>
        <?php }else{?>
            aucun resultat pour  <?php echo $recherche;?><a href="../index.php">accueil</a>
        <?php }?>
    </ul>
    <?php  while($a=$article->fetch()){?>
        <a href="article.php?idPub=<?= $a['idPub']?>">
            <?php
            ?>
            <img src="php/images/'.$_GET['image'].'" width=250px height=300px>
            <?php  ?>

        </a>
    <?php } ?>

</div>


<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="js/jquery.superslides.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/inewsticker.js"></script>
<script src="js/bootsnav.js."></script>
<script src="js/images-loded.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/baguetteBox.min.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>
</body>

</html>





