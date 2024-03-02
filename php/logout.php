<?php
	// Initialiser la session
	session_start();
	
	// Redirection vers la page de connexion
	header("Location: ../index.php");
	// Détruire la session.
	session_destroy();
		
	
?>