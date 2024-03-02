
<?php
    session_start();
require_once ("../views/connexion.php");
$ide = $connexion->query('SELECT * FROM article  ORDER BY  id_article desc ');
$panier=$connexion->query('SELECT * FROM panier_publ');
$publier=$connexion->query('SELECT * FROM publier');
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

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
<?php
if (isset($_SESSION['username']) && isset($_SESSION['id']))
    {
        $id=strip_tags($_SESSION['id']);
        
        $sql='SELECT * FROM `users` WHERE `id`=:id;';

        $query=$connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $user=$query->fetch();



        
    ?> 
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
                        <li class="nav-item "><a class="nav-link" href="admin.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Article</a></li>

                        <li class="dropdown active">
                            <a href="#"  class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Gestion</a>
                            <ul class="dropdown-menu active">
                                <li><a href="dashboard.php">Tableau de bord</a></li>
                                <li><a href="compte.php">Comptes</a></li>
                                <li><a href="compte.php">Articles</a></li>
                                
                            </ul>
                        </li>
                        

                        <li class="nav-item"><a class="nav-link" href="../profile.php"><h3><img src="../views/upload/<?php echo $user['image']; ?>" class="rounded-circle" width="60px" height="50px" /></i></h3>
                    </a></li>
                        <li onclick="return confirm('Voulez vous vous déconnecter?')" class="nav-item"><a class="nav-link" href="../logout.php">Déconnexion <li><i class="fa fa-sign-out"></i></li></a></li>
                     
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
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

   

<?php
    }else{
         header('Location: ../index.php');
    }
?>      
<?php
                if(!empty($_SESSION['success']))
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
                    $_SESSION['success']="";
            
                }
            ?>
            <?php
                if(!empty($_SESSION['erreur']))
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>';
                    $_SESSION['erreur']="";
            
                }
            ?>

        
         <!-- Start Categories  -->



    <div class="products-box">
  
  <div class="container">


    <div class="row">   

    <?php while ($articles = $ide->fetch()){
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
              
              <div class="col-lg-3 col-md-6 special-grid top-featured">
                      <div class="why-text">
                         
                          <h3> <a href="profileUser.php?id=<?=$user['id']?>"><img src="../views/upload/<?php echo $user['image']; ?> "  class="rounded-circle" width="50px" height="40px" /></a></i> <?=$user['username']?></h3>
                      </div>

                  <div class="products-single fix">
                      <div class="box-img-hover">
                          
                      <a href="php/info_article.php?id_article=<?= $articles['id_article']?>"> <?php  echo "<img src='http://localhost/FREESHOPPING/assets/images/".$image['img1']."'  class='img-fluid'>"; ?></a>

                          <div class="mask-icon">
                              <ul>
                                  <li><a href="deleteArticle.php?id=<?=$articles['id_article']?>" data-toggle="tooltip" data-placement="right" title="Supprimer"><i class="fas fa-trash"></i></a></li>
                    
                              </ul>
                          </div>
                      </div>
                      <div class="why-text">
                          <h4><?php echo $articles['titre']."\t\t\t\t\t\t\t\t\t\t\t\t";?><?=$articles['prix']?> <?php echo"FCFA";?></h4>
                          <h4><?=$articles['etat']?></h4>
                         
                      </div>
                  </div>
              </div>
              <?php }?>

              </div>  
      </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
          </div>

          <?php while ($articles = $ide->fetch()){
              $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
              $imagesResult = $images->execute(array($articles['id_img']));
              $image = $images->fetch();

              ?>
              <div class="col-md-3">
              <?php
                          
                          $id=strip_tags($articles['id']);
                          $sql='SELECT * FROM `users` WHERE `id`=:id;';

                          $query=$connexion->prepare($sql);
                          $query->bindValue(':id', $id, PDO::PARAM_INT);
                          $query->execute();

                          $user=$query->fetch();
                  ?>
                  <h3><i class="fa fa-user"></i> <?=$user['username']?></h3>
                  <div class="product-item">
                      <a href="php/info_article.php?id_article=<?= $articles['id_article']?>"> <?php  echo "<img src='http://localhost/FREESHOPPING/assets/images/".$image['img1']."'  class='img-fluid'>"; ?></a>

                      <div class="down-content">

             
                          <a href="#"><h4><?=$articles['titre']?></h4></a>
                          <h6><?=$articles['prix']?><?php echo"FCFA";?></h6>
                          <p><?=$articles['etat']?></p>
                         
                          
                      </div>
                  </div>
              </div>
<!--            <div class="col-sm-3">-->
<!---->
<!--                <div class="product-item">-->
<!--                    <a href="php/info_article.php?id_article=--><?//= $articles['id_article']?><!--"> --><?php // echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='90'>"; ?><!--</a>-->
<!--                    <div class="down-content">-->
<!--                        <a href="#"><h4>--><?//=$articles['titre']?><!--</h4></a>-->
<!--                        <h6>--><?//=$articles['prix']?><!----><?php //echo"FCFA";?><!--</h6>-->
<!--                        <p>--><?//=$articles['etat']?><!--</p>-->
<!---->
<!--                        <span>Reviews (24)</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
          <?php    }?>
<!-- Banner Ends Here -->
      </div>

  <!-- End Categories -->


  







  <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

  <!-- ALL JS FILES -->
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- ALL PLUGINS -->
  <script src="../js/jquery.superslides.min.js"></script>
  <script src="../js/bootstrap-select.js"></script>
  <script src="../js/inewsticker.js"></script>
  <script src="../js/bootsnav.js."></script>
  <script src="../js/images-loded.min.js"></script>
  <script src="../js/isotope.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/baguetteBox.min.js"></script>
  <script src="../js/form-validator.min.js"></script>
  <script src="../js/contact-form-script.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>