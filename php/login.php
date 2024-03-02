<?php

	if($_POST)
	{
		require('views/connexion.php');
		if(isset($_POST['username']) && !empty($_POST['username']) &&
		   isset($_POST['password']) && !empty($_POST['password']))
	    {
			   $username=strip_tags($_POST['username']);
			   $password=strip_tags($_POST['password']);
			  // $hashedPwd=password_hash($password, PASSWORD_DEFAULT);


			 //  password_verify($password, $hashedPwd);

			   $sql='SELECT * FROM `users` WHERE `username`=:username;';

			   $query=$connexion->prepare($sql);

			   $query->bindValue(':username', $username, PDO::PARAM_STR);

			   $query->execute();

			   $user=$query->fetch(PDO::FETCH_ASSOC);
				
			   if($query->rowCount() > 0)
			   {
				   if($username==$user["username"])
				   {
			
					//if(password_verify($password, $user["password"]))

					   if($password==$user["password"])
					   {
							session_start();

						   	$_SESSION['id']=$user['id'];
			   				$_SESSION['username'] = $username;
			   				$_SESSION['role'] = $user['role'];
			  				//$_SESSION['password'] = $password;

						   	if($user['role']=="admin")
							   {
								   header('Location: admin/admin.php');
							   }
						   	if($user['role']=="user")

							{
								header('Location: user.php');

							}
			   				
						   

						   //	$role = $user['role'];

			  			//	$_SESSION['role'] = $role;

							$_SESSION['success']="Login réussi";

								
					   }
					   else{

							$_SESSION['erreur']="Mot de passe incorrect";

					   }
				   }else{

						$_SESSION['erreur']="Username incorrect";

				   }
				}
				else
				{
					$_SESSION['username'] = "";

					$_SESSION['erreur']="Username incorrect ";


		    	}		
		}
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
                    <a class="navbar-brand" href="../index.php"><img src="images/" class="logo" alt=""></a>
                    <a class="navbar-brand"  href="index.php"><h2>FREE<em>SHOPPING</em></h2></a>
                    
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

    
      

    <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" >
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="../images/instagram-img-01.jpg" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Connectez vous!</h1>
                                </div>
                                <form action="" method="post">
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control form-control-user"
                                                id="exampleInputUserName" 
                                                placeholder="Entrez le nom d'utilisateur..." required>
                                        </div>
                                        <div class="form-group" class="position-absolute" style="right: 0px">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mot de passe" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi
                                                    </label>
                                            </div>
                                        </div>
                          
                                        <button class="btn btn-dark btn-user btn-block">Se connecter</button>
                                      <div class="text-center">
                                      
                                </form>
                                <a class="small" href="register.php">Créer un compte!</a>
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

