<?php
    session_start();
require_once ("views/connexion.php");
//variables globales
        $idImage = 0;
        $message='';

// requetes
$requete = $connexion->query('SELECT * FROM type_article');
$genres = $connexion->query('SELECT * FROM genre');


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
if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role']=="admin")
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
                    <a class="navbar-brand"  href="admin.php"><h2>FREE<em>SHOPPING</em></h2></a>
                    
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="admin/admin.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Article</a></li>

                        <li class="dropdown ">
                            <a href="#"  class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Gestion</a>
                            <ul class="dropdown-menu">
                                <li><a href="dashboard.php">Tableau de bord</a></li>
                                <li><a href="compte.php">Comptes</a></li>
                                <li><a href="compte.php">Articles</a></li>
                                
                            </ul>
                        </li>
                        

                        <li class="nav-item active"><a class="nav-link" href="../profile.php"><h3><img src="views/upload/<?php echo $user['image']; ?>" class="rounded-circle" width="60px" height="50px" /></i></h3>
                    </a></li>
                        <li onclick="return confirm('Voulez vous vous déconnecter?')" class="nav-item"><a class="nav-link" href="logout.php">Déconnexion <li><i class="fa fa-sign-out"></i></li></a></li>
                     
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
    }else if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role']=="user")
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
                    <a class="navbar-brand"  href="user.php"><h2>FREE<em>SHOPPING</em></h2></a>
                    
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="user.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Article</a></li>

                        
                        

                        <li class="nav-item active"><a class="nav-link" href="../profile.php"><h3><img src="views/upload/<?php echo $user['image']; ?>" class="rounded-circle" width="60px" height="50px" /></i></h3>
                    </a></li>
                        <li onclick="return confirm('Voulez vous vous déconnecter?')" class="nav-item"><a class="nav-link" href="logout.php">Déconnexion <li><i class="fa fa-sign-out"></i></li></a></li>
                     
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
         header("Location: ../index.php");
    }
?>  
<?php
	if(!empty($_SESSION['erreur']))
	{
		echo '<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>';
		$_SESSION['erreur']="";
	}
	if(!empty($_SESSION['success']))
	{
		echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
		$_SESSION['success']="";

	}
?>
    
    <?php
                if (isset($_FILES['image']) && isset($_POST['titre']) && isset($_POST['prix']) && isset($_POST['contenu'])){
                $count = count($_FILES['image']['name']);
                $names = array();
                for ($i=0;$i<$count;$i++){
                    $filmaName = $_FILES['image']['name'][$i];

                    $v= move_uploaded_file($_FILES['image']['tmp_name'][$i],'../assets/images/'.$filmaName);
                    if ($v) $names[]=$filmaName;
                }
                $reqImages = null;
                switch ($count){
                    case 1 :
                        $reqImages = $connexion->prepare('INSERT INTO image(img1)VALUES(?)');
                    break;
                    case 2 :
                        $reqImages = $connexion->prepare('INSERT INTO image(img1,img2)VALUES(?,?)');
                    break;
                    case 3 :
                        $reqImages = $connexion->prepare('INSERT INTO image(img1,img2,img3)VALUES(?,?,?) ');
                    break;
                    case 4 :
                        $reqImages = $connexion->prepare('INSERT INTO image(img1,img2,img3,img4)VALUES(?,?,?,?)');
                    break;

                }
                $result = null;
                if (count($names)>0 && $reqImages!=null)
                $result = $reqImages->execute($names);

                if ($result != null){
                    $idImage = $connexion->lastInsertId();

                    $articleReq=$connexion->prepare("INSERT INTO article(titre,contenu,prix,etat,marque,id,id_img,id_type,id_genre)VALUES(?,?,?,?,?,?,?,?,?);");
                    try {
                        $g=array($_POST['titre'],$_POST['contenu'],$_POST['prix'],$_POST['etat'],$_POST['marque'],$_SESSION['id'],intval($idImage) ,intval($_POST['type']),intval($_POST['genre']));
                        $isInsert=$articleReq->execute($g);
                        $message=$g;

                    }catch (PDOException $exception){
                        $message= $exception->getMessage();
                        die;
                    }

                    // $message = $isInsert;
                }
                $_SESSION['success']="Article ajouté";
                

    }?>      

<?php





            $ide = $connexion->query('SELECT * FROM article');
            ?>
        <br><br><br><br><br><br>
        <div class="product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div>
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" >
                                <?php
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Titre</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="titre" class="form-control" placeholder="Titre de l'article ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Prix
                                        <?php

                                        ?>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="number" name="prix" class="form-control" placeholder="entrez un prix ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Marque</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="marque" class="form-control" placeholder="entrez une marque">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Type
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="type">
                                            <?php
                                            while ($type = $requete->fetch()){
                                                ?>
                                                <option value="<?=$type['id_type']?>"><?=$type['libelle']?></option>
                                                <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Categorie
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="genre">
                                            <?php
                                            while ($genre = $genres->fetch()){
                                                ?>
                                                <option value="<?=$genre['id_genre']?>"><?=$genre['libelle']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Etat </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="etat">
                                            <option value="neuf etiquetté">neuf etiquetté</option>
                                            <option value="tres bon etat">tres bon etat</option>
                                            <option value="bon etat">bon etat</option>
                                            <option value="satisfaisant">satisfaisant</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Contenu</label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="decrivez votre article en detaille" class="form-control" name="contenu"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image[]" class="form-control" multiple>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="submit" name="image" class=" btn btn-primary form-control"value="vendre"  >
                                    </div>
                                </div>

                            </form>
                        </div>
                        <?php
                            while ($articles = $ide->fetch()){
                                $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                                $imagesResult = $images->execute(array($articles['id_img']));
                                $image = $images->fetch();
                            }
                        ?>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
 <!-- ***** Preloader Start ***** -->
 <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    
   
  



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
