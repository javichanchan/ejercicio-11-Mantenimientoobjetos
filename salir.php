<?php
	session_start();
	if (isset($_SESSION['usuario'])){ 
		session_destroy();
		echo "Hasta la próxima";
		echo "<a href='index.php'> Volver a entrar </a>";
	}else{
		echo "Es necesario estar validado";
		echo "<a href='index.php'> validar </a>";
	}