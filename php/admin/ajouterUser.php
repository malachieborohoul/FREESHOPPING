<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un user</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
			

<?php
session_start();

//Si on clique sur le bouton s'inscrire
if($_POST)
{
	
	require_once('../db/config.php');
	if(isset($_POST['username']) && !empty($_POST['username']) &&
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['password']) && !empty($_POST['password']) && 
    isset($_POST['role']) && !empty($_POST['role']))
    {
		//On néttoie les données qui nous ont été fournies
		$username=strip_tags($_POST['username']);
		$email=strip_tags($_POST['email']);
		$password=strip_tags($_POST['password']);
		$role=strip_tags($_POST['role']);
	//	$hashedPwd=password_hash($password, PASSWORD_DEFAULT);

		$sql='SELECT * FROM `users` ;';

		$query=$db->prepare($sql);

		$query->bindValue(':username', $username, PDO::PARAM_STR);
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query->bindValue(':password', $password, PDO::PARAM_STR);
		$query->bindValue(':role', $role, PDO::PARAM_STR);

		$query->execute();
		$users=$query->fetchAll(PDO::FETCH_ASSOC);

		//Verifier si le username existe déja

		foreach($users as $user){
			if($user['username'] == $username){
				$_SESSION['erreur']= $user['username'] . " existe déja";
				header('Location: compte.php');
				die();
				
			}else{
				$result=true;
			}
		}
		if($result == true)
		{
			$sql='INSERT INTO `users` (`username`,`email`, `password`, `role`) VALUES (:username, :email, :password, :role);';

				$query=$db->prepare($sql);

				$query->bindValue(':username', $username, PDO::PARAM_STR);
				$query->bindValue(':email', $email, PDO::PARAM_STR);
				$query->bindValue(':password', $password, PDO::PARAM_STR);
				$query->bindValue(':role', $role, PDO::PARAM_STR);

				$query->execute();

				$_SESSION['success']="Vous avez ajouté un user";	
                header('Location: compte.php');
                die();
                require_once('../db/close.php');
		}
		

		

		
	}else{
		$_SESSION['erreur']="Veuillez remplir les formulaire";
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
<div class="container d-flex justify-content-center align-items-center">
	<form  method="post">
	<h3>Ajouter un user</h3>
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
            <label for="sel1">Role</label>
            <select class="form-control" id="sel1" name="role">
                <option>user</option>
                <option>admin</option>
                
            </select>
        </div>

		<button class="btn btn-dark">Ajouter</button>
	</form>
</div>
	


<?php
include_once '../footer.php'
?>
