
<?php
require_once("views/connexion.php");
session_start();
$article=$connexion->query('SELECT titre from article order by id_article DESC');
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
    $recherche=htmlspecialchars($_GET['recherche']);

    $article=$connexion->query('SELECT titre  from article where titre like "%'.$recherche.'%" order by id_article DESC');

}

?>

<div class="header">

    <form class="form-inline" enctype="multipart/form-data" method="GET" action="php/recherche.php" >
        <input  type="search" placeholder="Search" class="input" name="recherche">
        <button  type="submit" class="button"  ><span class="glyphicon glyphicon-search " style="font-size:20px;color:#6610f2;"></span></button>

        <a href="php/ajout_article.php" class="second-button">vends tes articles</a>
    </form>

</div>


<br><br><br><br>
<div class="catalogue">
    <ul>
        <?php if($article->rowCount() > 0){  ?>
            <?php
            while($a=$article->fetch()){
                ?>

                <li><?php echo $a['titre'];?></li> <br>



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



