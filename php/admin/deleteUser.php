<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {   
        require_once('../views/connexion.php');
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id=strip_tags($_GET['id']);

            $sql='SELECT * FROM `users` WHERE `id`=:id;';

            $query=$connexion->prepare($sql);

            $query->bindValue(':id', $id, PDO::PARAM_STR);

            $query->execute();

            $user=$query->fetch();
            if(!$user)
            {
                $_SESSION['erreur']="id invalide";
                header('Location: compte.php');
            }
            $sql='DELETE FROM `users` WHERE `id`=:id;';

            $query=$connexion->prepare($sql);

            $query->bindValue(':id', $id, PDO::PARAM_STR);

            $query->execute();

            $_SESSION['success']="User supprimé";
            header('Location: compte.php');
            die();
            



        }else{
              $_SESSION['erreur']="URL invalide";
              header('Location: compte.php');

        }
    }else{
        header('Location: index.php');
    }
?>
<?php

