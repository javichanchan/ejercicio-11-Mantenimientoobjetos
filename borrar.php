<?php
session_start();
if (isset($_SESSION['usuario'])) {
 include"modelo.php";
 $bd=new base();
 $cli=new cliente();
 $cli->dniCliente=$_GET['dni'];
 $cli->borrar($bd->link);

 

 echo "SE HA BORRADO EL CLIENTE CON DNI $cli->dniCliente";
 echo "<a href='clientes.php'>volver</a>";
 // Liberamos los registros

 }else
{
	echo "es necesario estar registrado";
	echo "<a href='index.php'>login</a>";
}
