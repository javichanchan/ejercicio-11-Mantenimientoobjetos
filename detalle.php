<?php
session_start();
if (isset($_SESSION['usuario'])) {
 include"modelo.php";
 $bd=new base();
 $cli=new cliente();
 $cli->dniCliente=$_GET['dni'];
 $row=$cli->consultar($bd->link);
 $cli->cargar($row);
 $cli->detalle();
 echo "<a href='clientes.php'>volver</a>";
 
}else
{
	echo "es necesario estar registrado";
	echo "<a href='index.php'>login</a>";
}