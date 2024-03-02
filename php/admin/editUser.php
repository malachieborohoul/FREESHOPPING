

    <?php


session_start();

require_once('../views/connexion.php');
if (isset($_SESSION['username']) && isset($_SESSION['id']))

{
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $stmt_edit = $connexion->prepare('SELECT * FROM users WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);

    }else{
        header('Location: compte.php');
    }
        

    if(isset($_POST['btnsave']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];		
        $password = $_POST['password'];		
        $role = $_POST['role'];		
        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        if($imgFile)
        {
            $upload_dir = '../views/upload/';
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
            $userprofile = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {			
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['image']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
                }
                else
                {
                    $_SESSION['erreur'] = "Fichier volumineux Maxi 5mb";
                }
            }
            else
            {
                $_SESSION['erreur'] = "Desolé seules les extentions JPG, JPEG, PNG & GIF";		
            }	
        }
        else
        {
            $userprofile = $edit_row['image'];
        }
        if(!isset($_SESSION['erreur']))
        {
            $stmt = $db->prepare('UPDATE users SET username=:username, email=:email, password=:password, role=:role, image=:image WHERE id=:id');
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->bindParam(':role',$role);
            $stmt->bindParam(':image',$userprofile);	
            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Modification réussie...');
                window.location.href='compte.php';
                </script>
                <?php
            }
            else{
                $_SESSION['erreur'] = "La modification ne peut pas aboutir";
            }
        }			
    }
}else{
    header('Location: index.php');
}
?>
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

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    
    
    <div class="banner header-text">
        <?php
          if(!empty($_SESSION['erreur']))
            {
              echo '<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>';
              $_SESSION['erreur']="";
            }
        ?>
    

        <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row" >
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                        <p><img src="../views/upload/<?=$edit_row['image']?>" class="img-rounded" width=auto height="500px" /></p>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Modifier profile!</h1>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                               
                                                <div class="form-group">
                                                    <input type="text" id="username" name="username" class="form-control" value="<?=$edit_row['username']?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" id="email" name="email" class="form-control" value="<?=$edit_row['email']?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" id="password" name="password" class="form-control" value="<?=$edit_row['password']?>"required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="role" id="role" name="role" class="form-control" value="<?=$edit_row['role']?>"required>
                                                </div>
                                        
                                                <div class="form-group">
                                        
                                                    <label class="control-label">Photo</label>
                                                    <input class="input-group" type="file" name="image" />
                                                
                                                                                
                                                </div>
                                                <tr>
                                                    <td colspan="2" align="center"><button type="submit" name="btnsave" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Save</button>
                                                    <a href="compte.php" class="btn btn-warning">Retour</a>
                                                    </td>
                                                </tr>               
                                                
                                            </form>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
  
  


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
