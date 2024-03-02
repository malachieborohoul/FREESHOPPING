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
if($article->rowCount()==1){
    $article=$article->fetch();
     $titre=$article['titre'];
    $prix=$article['prix'];
    $contenu=$article['contenu'];
    $etat=$article['etat'];
    $marque=$article['marque'];
    $idImage = $article['id_img'];
    $idUser= $article['id'];

    }
    else{
        die("cet pas");
    }

?>
<div class="col-sm-12">

<div class="container">
<table>
    <tr>
        <td>TITRE: </td>
        <td><?=$titre?></td>
    </tr>
    <tr>
        <td>PRIX: </td>
        <td><?=$prix?></td>

    </tr>

    <tr>
        <td>CONTENU:</td>
        <td><?= $contenu?></td>
    </tr>
    <tr>
        <td>MARQUE: </td>
        <td><?= $marque?></td>
    </tr>
    <tr>
        <td>ETAT: </td>
        <td><?=$etat?></td>
    </tr>

    <tr>
        <td>Auteur: </td>
        <?php
                            
                                    $id=strip_tags($idUser);
                                    $sql='SELECT * FROM `users` WHERE `id`=:id;';

                                    $query=$connexion->prepare($sql);
                                    $query->bindValue(':id', $id, PDO::PARAM_INT);
                                    $query->execute();

                                    $user=$query->fetch();
                            ?>
        <td><?=$user['username']?></td>
    </tr>
    <br>
    
    


            <?php
            $images = $connexion->prepare('SELECT * FROM image WHERE id_img=?');
            $imagesResult = $images->execute(array($idImage));
            $image = $images->fetch();
            if (!empty($image['img1']))
                echo "<img width='150' height='200' src='http://localhost/FREESHOPPING/assets/images/".$image['img1']."'>";
            if (!empty($image['img2']))
                echo "<img width='150' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img2']."'>";
            if (!empty($image['img3']))
                echo "<img width='150' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img3']."'>";
            if (!empty($image['img4']))
                echo "<img width='150' height='300' src='http://localhost/FREESHOPPING/assets/images/".$image['img4']."'>";
            ?>

    <div class="col-sm-3">

    </div>
</table>



        </div>
    </div>
















