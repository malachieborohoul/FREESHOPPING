
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

?>

<div class="header">

    <form class="form-inline" enctype="multipart/form-data" method="GET" >
        <input  type="search" placeholder="Search" class="input" name="recherche">
        <input type="submit" class="button" href="php/recherche.php" >

        <a href="php/ajout_article.php" class="second-button">vends tes articles</a>
    </form>

</div>


<br><br><br><br>
<div class="catalogue">
    <ul>
        <?php if($article->rowCount() > 0){
            
           ?>
            <?php
            while($a=$article->fetch()){
               
                ?>
                
                <div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>

          
                <div class="col-md-3">
                    <div class="product-item">
                        <a href="info_article.php?id_article=<?= $a['id_article']?>">
                        <?php
                   
                   $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
                   $imagesResult = $images->execute(array($a['id_img']));
                   $image = $images->fetch();
                   echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='200'>";
                   
           ?>   <div class="down-content">
                            <a href="#"><h4><?=$a['titre']?></h4></a>
                            <h6><?=$a['prix']?><?php echo"FCFA";?></h6>
                            <p><?=$a['etat']?></p>
                            
                           
                        </div>
                    </div>
                </div>

           

        </div>
    </div>
                <br>
               


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





