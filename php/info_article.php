

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

                        

                        <li class="nav-item"><a class="nav-link" href="php/login.php">Connexion</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

  

    <br><br><br><br><br>
<style>
    .container {
        : 500px;
        width: 100%;
        padding-right: 5px;
        font-size: 20px;

    }
</style>
<?php
require_once("views/connexion.php");
$ide = $connexion->query('SELECT id_img FROM article');
if(isset($_GET['id_article']) AND !empty($_GET['id_article'])){
$get_id=htmlspecialchars($_GET['id_article']);
$article=$connexion->prepare('SELECT * FROM article WHERE id_article=?');
$article->execute(array($get_id));


}
if($article->rowCount() ==1){
    $article=$article->fetch();
     $titre=$article['titre'];
    $prix=$article['prix'];
    $contenu=$article['contenu'];
    $etat=$article['etat'];
    $marque=$article['marque'];
    $idImage = $article['id_img'];

    }
    else{
        die("cet artcicle n\'existe pas");
    }

?>


<!-- Start Categories  -->
<div class="products-box">
   

      <div class="row">   

    <?php 
    $second = $connexion->query('SELECT * FROM article Where id_type=2 ORDER BY  id_article desc ');
    while ($articles = $second->fetch()){
                $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                $imagesResult = $images->execute(array($articles['id_img']));
                $image = $images->fetch();

                ?>
                 <?php
                            
                            $id=strip_tags($articles['id']);
                            $sql='SELECT * FROM `users` WHERE `id`=:id;';

                            $query=$connexion->prepare($sql);
                            $query->bindValue(':id', $id, PDO::PARAM_INT);
                            $query->execute();

                            $user=$query->fetch();
                    ?>
                
               
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                            </div>
                        <a href="php/info_article.php?id_article=<?= $articles['id_article']?>">
                         <?php
                            $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                            $imagesResult = $images->execute(array($idImage));
                            $image = $images->fetch();

                            
                            if (!empty($image['img1']))
                            echo "<img width='200' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img1']."'>";
                            if (!empty($image['img2']))
                                echo "<img width='200' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img2']."'>";
                            if (!empty($image['img3']))
                                echo "<img width='200' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img3']."'>";
                            if (!empty($image['img4']))
                                echo "<img width='200' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img4']."'>";
                            ?>

                            
                        </div>
                        <div class="why-text">
                            <h4>titre:<?= $titre?></h4>
                            <h5>prix: <?=$prix?> <?php echo"FCFA";?></h5>
                            <h4>etat:<?= $etat?></h4>
                            <h4>descriptio:<?= $titre?></h4>
                        </div>
                    </div>
                </div>
                <?php }?>

                </div>  
        </div>
        </div>
    </div>











<div class="col-sm-12">

<div class="container">
<table>
   

          


















    <div class="col-sm-3">

    </div>
</table>



        </div>
    </div>



















 


















    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>A propos de Free Shopping</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">A propos de nous</a></li>
                                
                                <li><a href="#">Termes &amp; Conditions</a></li>
                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fa fa-map-marker-alt"></i>Addresse: Ngaoundéré <br>Dang<br> Bini </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope"></i>Email: <a href="mailto:malachieborohoul@gmail.com">malachieborohoul@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

  

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