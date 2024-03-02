<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Free Market</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

  </head>

  <body>

    <?php


    session_start();


    if (isset($_SESSION['username']) && isset($_SESSION['id']))
    {
    ?>  

        <!-- Header -->
            <header >
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                <a class="navbar-brand" href="admin.php"><h2>Free <em>Market</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Accueil
                        <span class="sr-only">(current)</span>
                        </a>
                    </li> 
                    

                    <ul class="navbar-nav">
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            Gestion des comptes
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="compte.php">Tableau</a>
                            </div>
                        </li>
                    </ul>

 
                    </ul>
                    <ul class="nav navbar ml-auto">
                        <li>
                            <a class="nav-link" href="../profile.php"><span class="glyphicon glyphicon-edit"></span>Profile</a>
                        </li>
                    </ul>
                    <ul class="nav navbar ml-auto">
                        <li>
                            <a onclick="return confirm('Voulez vous vous déconnecter?')"class="nav-link" href="../logout.php">Déconnexion</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            </header>
        
        <?php
            }
        
                else{ ?>
                        
                <?php
                header('Location: index.php');
                }
                ?>

                
            <?php
            
            if(!empty($_SESSION['success']))
            {
                echo '<div class="alert alert-success" role="alert">'. $_SESSION['success']. '</div>';
                $_SESSION['success']= "";
            } 
            ?> 
            <div class="banner header-text">

                <div class="container d-flex justify-content-center align-items-center">
                    <h1>Bienvenue <?=$_SESSION['username']; ?>!</h1>
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

    
   
  


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
