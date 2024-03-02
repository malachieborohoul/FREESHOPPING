<?php

	if($_POST)
	{
		require('connexion.php');
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
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
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
  


