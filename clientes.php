<?php
session_start();
if (isset($_SESSION['usuario'])) {
	include "modelo.php";
	echo " Bienvenido ".$_SESSION['usuario']."<BR><BR>";
	include "funciones.php";
	$bd=new base();
	$consulta="SELECT * FROM clientes ";
	$result=$bd->link->query($consulta);
	$fila=$result->fetch_assoc();
	echo "<table>";
	titulo($fila);
	$cli=new cliente();
	$cli->cargar($fila);
	$cli->linea();
	while ($fila=$result->fetch_assoc()){
		$cli=new cliente();
		$cli->cargar($fila);
		$cli->linea();
	} 
	echo "</table>";
	
}else{
	echo "Es necesario estar registrado";
	echo "<a href='index.php'> Login </a>";
}