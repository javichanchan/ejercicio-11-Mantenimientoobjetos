<?php
include "modelo.php";
session_start();
if (isset($_SESSION['usuario'])) {
		echo " Bienvenido ".$_SESSION['usuario']."<BR><BR>";
		echo "<a href='clientes.php'>IR A CLIENTES</a>";


	}else{

		if (isset($_POST['enviar'])){
			$bd=new base();
			$cli=new cliente();
			$cli->dniCliente=$_POST['dni'];
			$cli->pwd=$_POST['con'];
			
			
			
			if ($fila=$cli->validar($bd->link)){
				$_SESSION['usuario']=$fila['nombre'];
				echo " Bienvenido ".$_SESSION['usuario']."<BR><BR>";
				echo "<a href='clientes.php'>IR A CLIENTES</a>";

			}else
			{
				echo "Usuario y/o contraseña incorrectos";
				echo "<a href='index.php'> Volver </a>";
			}
		}else{
			echo "<form action='' method ='post'>";
			echo "dni: <input type='text' name='dni'><br>";
			echo "Contraseña: <input type='text'name='con'><br>";
			echo "<input type='submit' value='enviar' name='enviar'></form>";
		
		}

		
		
	}

