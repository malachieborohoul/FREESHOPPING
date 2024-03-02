<?php
  function headered($headerDefine = array(),$active=""){

      /*
       * $headerDefine = [[lien,headerLabel,active],...]
       */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>VINTAGE</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../css/fontawesome.css">
    <link rel="stylesheet" href="../css/templatemo-sixteen.css">
    <link rel="stylesheet" href="../css/owl.css">
    <link rel="stylesheet" href="../css/index.css.css">
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><h2>free<em>Shopping</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../index.php">Accueil-->
<!--                            <span class="sr-only">(current)</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../index.php">Articles</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item ">-->
<!--                        <a class="nav-link" href="about.php">A propos</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="contact.php">Nous contacter</a>-->
<!--                    </li>-->
                    <?php
                        if (!empty($headerDefine)){
                            for($i=0;$i<count($headerDefine);$i++){

                    ?>
                                <li class="nav-item <?php
                                        if ($headerDefine[$i]['headerLabel'] == $active)
                                             echo 'active';
                                        else
                                            echo '';
                                ?>">
                                    <a class="nav-link" href="<?=$headerDefine[$i]['lien']?>.php"><?=$headerDefine[$i]['headerLabel']?></a>
                                </li>
                                <?php

                            }
                        }
                                ?>

                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
  }
  ?>