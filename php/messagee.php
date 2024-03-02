


<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>FreeShopping</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">

			<!-- Site Icons -->
			<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Site CSS -->
		<link rel="stylesheet" href="../css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="../css/responsive.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/custom.css">

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
				<?php
   				 session_start();
				?>
				<?php
					require_once ("views/connexion.php");

					if (isset($_SESSION['username']) && isset($_SESSION['id']))
						{
							if(isset($_GET['id']) && !empty($_GET['id'])){
								$idRe=strip_tags($_GET['id']);
								$sql='SELECT * FROM `users` WHERE `id`=:id';
								$query=$connexion->prepare($sql);
								$query->bindValue('id', $idRe);
								$query->execute();
								$user=$query->fetch();
							}
						}

				?>
				<?php
						$sq='SELECT * FROM `message` WHERE `idEnvoyeur`=:idEn AND `idRecepteur`=:idRe OR `idEnvoyeur`=:idRe AND `idRecepteur`=:idEn' ;
						$query=$connexion->prepare($sq);
						$query->bindValue(':idEn', $_SESSION['id']);
						$query->bindValue(':idRe', $_GET['id']);
											
						$query->execute();
						$message=$query->fetchAll();
	
											
					
						?>

								<?php
									
									if(isset($_POST)){
										if(isset($_POST['send']) && !empty($_POST['send']))
										{
											$mess=$_POST['send'];
											$sql='INSERT INTO `message` (`message`,`idEnvoyeur`, `idRecepteur`) VALUES (:mess, :idEn,:idRe)';
											$query=$connexion->prepare($sql);
											$query->bindValue(':mess', $mess);
											$query->bindValue(':idRe', $idRe);
											$query->bindValue(':idEn', $_SESSION['id']);
											$query->execute();
											header('Location: messagee.php');
										}
									}
									
								?>

			<!-- End of Create Chat -->
			<div class="main">
					<div class="tab-content" id="nav-tabContent">
						<!-- Start of Babble -->
						<div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
							<!-- Start of Chat -->
							<div class="chat" id="chat1">
								<div class="top">
									<div class="container">
										<div class="col-md-12">
											<div class="inside">
												<a href="#"><img class="avatar-md" src="views/upload/<?php echo $user['image']; ?>" data-toggle="tooltip" data-placement="top" title=<?=$user['username']?> alt="avatar"></a>
												<div class="status">
													<i class="material-icons online">fiber_manual_record</i>
												</div>
												<div class="data">
													<h5><a href="#"><?=$user['username']?></a></h5>
													<span></span>
												</div>
												
												
											</div>
										</div>
									</div>
								</div>
								<div class="content" id="content">
									<div class="container">
										<div class="col-md-12">
											
											
											<?php foreach($message as $messages){
												if($messages['idEnvoyeur']==$_SESSION['id']){?>
											<div class="message me">
												<div class="text-main">
													<div class="text-group me">
														<div class="text me">
															<p><?=$messages['message']?></p>
														</div>
													</div>
													<span><?=$messages['time']?></span>
													<span><?=$messages['date']?></span>

												</div>
											</div>
											<?php }
											if($messages['idEnvoyeur']==$_GET['id']){?>
												<div class="message">
												<img class="avatar-md" src="views/upload/<?php echo $user['image']; ?>" data-toggle="tooltip" data-placement="top" title=<?=$user['username']?> alt="avatar">
												<div class="text-main">
													<div class="text-group">
														<div class="text">
															<p><?=$messages['message']?></p>
														</div>
													</div>
													<span><?=$messages['time']?></span>
													<span><?=$messages['date']?></span>
												</div>
											</div>



										<?php	}
										
										
										}?>
											
											
											
											
											
											
											
											
										</div>
									</div>
								</div>
								<div class="container">
									<div class="col-md-12">
										<div class="bottom">
										
							
											<form  action="" method="post"class="position-relative w-100">
												<textarea class="form-control" name="send" placeholder="Taper un message..." rows="1"></textarea>
												<button class="btn send disabled"><i class="material-icons">send</i></button>
												<button type="submit" class="btn send"><i class="material-icons">send</i></button>

											</form>
											
						
											<label>
												<input type="file">
												<span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
											</label> 
										</div>
									</div>
								</div>
							</div>
							<!-- End of Chat -->

		
						
						
						
			
										




	
  



	
		<!-- Bootstrap/Swipe core JavaScript !>
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/swipe.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script>
			function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
			scrollToBottom(document.getElementById('content'));
		</script>

		
    <!-- ***** Preloader Start ***** -->

   
  




		<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="../js/jquery.superslides.min.js"></script>
	<script src="../js/bootstrap-select.js"></script>
	<script src="../js/inewsticker.js"></script>
	<script src="../js/bootsnav.js."></script>
	<script src="../js/images-loded.min.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/baguetteBox.min.js"></script>
	<script src="../js/form-validator.min.js"></script>
	<script src="../js/contact-form-script.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>