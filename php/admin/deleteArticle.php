<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {   
        require_once('../views/connexion.php');
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id=strip_tags($_GET['id']);

            $sql='SELECT * FROM `article` WHERE `id`=:id;';

            $query=$connexion->prepare($sql);

            $query->bindValue(':id', $id);

            $query->execute();

            $article=$query->fetch();
           
            $sql='DELETE FROM `article` WHERE `article`.`id_article`=:id;';

            $query=$connexion->prepare($sql);

            $query->bindValue(':id', $id);

            $query->execute();

            $_SESSION['success']="Article supprimé";
            header('Location: article.php');
            die();
            



            require_once('close.php');
        }else{
              $_SESSION['erreur']="URL invalide";
              header('Location: article.php');

        }
    }else{
        header('Location: index.php');
    }
?>


