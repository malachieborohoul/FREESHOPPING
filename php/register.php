
<?php

session_start();
//Si on clique sur le bouton s'inscrire
require_once ("views/connexion.php");
if(isset($_POST['btnsave']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    if(empty($username)){
        $_SESSION['erreur'] = "Entrez votre nom.";
    }
    else if(empty($email)){
        $_SESSION['erreur'] = "Entrez votre email.";
    }
    else if(empty($password)){
        $_SESSION['erreur'] = "Entrez votre mot de pass.";
    }
    else if(empty($imgFile)){
        $_SESSION['erreur'] = "Inserez votre image.";
    }
    else
    {
        $upload_dir = 'views/upload/';
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $userprofile = rand(1000,1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions)){
            if($imgSize < 5000000)				{
                move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
            }
            else{
                $_SESSION['erreur'] = "Entrez votre Is Too Large To Upload. It Should Be Less Than 5MB.";
            }
        }
        else{
            $_SESSION['erreur'] = "Entrez votre JPEG, PNG & GIF Extension Files Are Allowed.";		
        }
    }   
    if(!isset($_SESSION['erreur'])){
        $sql='INSERT INTO users(username,email,password, image) VALUES(:username, :email, :password, :image);';
        $query=$connexion->prepare($sql);
        $query->bindParam(':username',$username);
        $query->bindParam(':email',$email);
        $query->bindParam(':password',$password);
        $query->bindParam(':image',$userprofile);	
        $query->execute();
       
            $_SESSION['success'] = "Inscription réussie.";
			header("refresh:1;login.php");
            
    }
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
                    <a class="navbar-brand"  href="../index.php"><h2>FREE<em>SHOPPING</em></h2></a>
                    
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="../index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">A propos de nous</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php">Article</a></li>

                        

                        <li class="nav-item active"><a class="nav-link" href="login.php">Connexion</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

             
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->



    <!-- Header -->

    <div class="banner header-text">
        <?php
          if(!empty($_SESSION['erreur']))
            {
              echo '<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>';
              $_SESSION['erreur']="";
            }
      ?>
      <?php
        if(!empty($_SESSION['success']))
          {
            echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
            $_SESSION['success']="";

          }
          ?>
    </div>
    
    <div class="banner header-text">
        <?php
          if(!empty($_SESSION['erreur']))
            {
              echo '<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>';
              $_SESSION['erreur']="";
            }
      ?>

    <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" >
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        <img src="../images/instagram-img-01.jpg" width=auto  height="480px" alt="">

                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Inscrivez vous!</h1>
                                </div>
                                <form method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" id="username" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
									</div>
									<div class="form-group">
										<input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
									</div>
                                    <div class="form-group">
                            
                                        <label class="control-label">Photo</label>
                                        <input class="input-group" type="file" name="image" />
                                    
                                                                    
                                    </div>
                                    <tr>
                                        <td colspan="2" align="center"><button type="submit" name="btnsave" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Enregistrer</button>
                                        </td>
                                    </tr>               
                                      
                                </form>
                                <a class="small" href="login.php">Se connecter</a>
                                      </div>
                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
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

