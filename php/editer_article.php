<?php
require_once('connexion.php');
session_start();

//variables globales
$idImage = 0;
$message='';

// requetes
$requete = $connexion->query('SELECT * FROM type_article');
$genres = $connexion->query('SELECT * FROM genre');



if (isset($_FILES['image']) && isset($_POST['titre']) && isset($_POST['prix']) && isset($_POST['contenu'])){
    $id_article=strip_tags($_POST['id_article']);
    $titre=htmlspecialchars($_POST['titre']);
    $prix=htmlspecialchars($_POST['prix']);
    $contenu=htmlspecialchars($_POST['contenu']);
    $etat=htmlspecialchars($_POST['etat']);
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

       $sql="UPDATE article SET `titre`=:titre,`prix`=:prix, 'contenu'=:contenu,'etat'=:etat,'marque'=:marque WHERE 'id_article'=:id_article;";
        $edit_article=$connexion->prepare($sql);
        $edit_article->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $edit_article->bindValue(':titre',$titre,PDO::PARAM_STR);
        $edit_article->bindValue(':prix',$prix,PDO::PARAM_STR);
        $edit_article->bindValue(':contenu',$contenu,PDO::PARAM_STR);
        $edit_article->bindValue(':marque',$marque,PDO::PARAM_STR);
        $edit_article->bindValue(':etat',$etat,PDO::PARAM_STR);
        $sql=$connexion->exec();
        $_SESSION['succes']="produit modifie";
        header('location: ../index.php');
        require_once ("close.php");
       // $message = $isInsert;
    }
    if (isset($_GET['id_article']) && !empty($_GET['id_article'])){
        require_once('connexion.php');
        $id_article=strip_tags($_GET['id_article']);
        $sql='SELECT * FROM `article` WHERE `id_article`=:id_article;';

        $edit_article=$connexion->prepare($sql);

        $edit_article->bindValue(':id_article', id_article, PDO::PARAM_INT);
        $edit_article->execute();

        $produit=$edit_article->fetch();
        if(!$produit){
            $_SESSION['erreur']="id invalide";
            header('Location: index.php');
        }

        require_once('close.php');

    }


}
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
                            <label class="control-label col-2">Titre</label>
                            <div class="col-10">
                                <input type="text" name="titre" value="<?=$produit['titre']?>" class="form-control" placeholder="entrez un titre a votre article">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-2">Prix
                                <?php

                                ?>
                            </label>
                            <div class="col-sm-10">
                                <input type="text"  name="prix" value="<?= $produit['prix']?>" class="form-control" placeholder="entrez un prix ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Marque</label>
                            <div class="col-sm-10">
                                <input type="text" name="marque" value="<?= $produit['marque'] ?>" class="form-control" placeholder="entrez une marque">
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
                                <select class="form-control" name="etat" value="<?= $produit['etat']?>">
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
                                <textarea placeholder="decrivez votre article en detaille" class="form-control" value="<?= $produit['contenu']?>"  name="contenu"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="image[]"  class="form-control" multiple>
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
                    echo "<img src='http://localhost/vintage/assets/images/".$image['img1']."' width='90' height='90'>";
                }
                ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>

