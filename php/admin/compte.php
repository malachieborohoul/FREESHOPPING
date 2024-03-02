
<?php
    session_start();
require_once ("../views/connexion.php");

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

                        <li class="dropdown active">
                            <a href="#"  class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Gestion</a>
                            <ul class="dropdown-menu">
                                <li><a href="dashboard.php">Tableau de bord</a></li>
                                <li><a href="compte.php">Comptes</a></li>
                                <li><a href="article.php">Articles</a></li>
                                
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
						<i class="fa fa-bell"></i>
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
            <form action="" method="get" class="form-inline">

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" name="nom" class="form-control" placeholder="Rechercher">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->

  
<?php
    }else{
         header('Location: ../index.php');
    }
?>  
        
            <?php
            //Acceder à la base de données pour récupérer toutes les informations 
                require_once('../views/connexion.php');


                //$nom= isset($_GET['nom'])?$_GET['nom']:"";
                if(isset($_GET['nom']) && !empty($_GET['nom'])){
                    $nom=$_GET['nom'];
                     $sql='SELECT * FROM `users` WHERE `username`=:nom;';

                }else
                {
                    $nom="";
                    $sql='SELECT * FROM `users`;';


                }
                

                $query=$connexion->prepare($sql);
                $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                $query->execute();

                $user=$query->fetchAll(PDO::FETCH_ASSOC);
                require_once('../views/close.php');
            ?>
            

           
                
        

     
    
    <div class="comptable">
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

<div class="container">
<div class="row">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <h3>Gestion des comptes </h3>

                    <thead>
                        <th>ID</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </thead>

                            <tbody>
                                <?php foreach($user as $users){?>
                                <tr>
                                    <td><?=$users['id']?></td>
                                    <td><?=$users['username']?></td>
                                    <td><?=$users['email']?></td>
                                    <td><?=$users['password']?></td>
                                    <td><?=$users['role']?></td>
                                    <td><img src="../views/upload/<?= $users['image'] ?>" width="50px" height=auto/></td>


                                    <td><a href="editUser.php?id=<?= $users['id']?>"><i class="fa fa-edit"></i></a>  <a onclick="return confirm('Etes vous surs de vouloir supprimer?')"href="deleteUser.php?id=<?= $users['id']?>"><i class="fa fa-trash"></i></a></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                    </table>
                </div>
                
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