<?php
include('funciones.php');
include('modelo.php');
session_start();
if (isset($_SESSION['usuario'])) {
$bd=new base();
$cli=new cliente();
if (!isset($_POST['enviar'])) {
	

	$op=$_GET['op'];
	if ($op=='mod'){		
			
 			$cli->dniCliente=$_GET['dni'];
 			$row=$cli->consultar($bd->link);
 			$cli->cargar($row);
			formulario($op);
		
	}else{
			formulario($op);
	}

}
else {
	$op=$_POST['op'];
	$cli->dniCliente=$_POST['dniCliente'];
	$cli->nombre=$_POST['nombre'];
	$cli->direccion=$_POST['direccion'];
	$cli->email=$_POST['email'];
	$cli->pwd=$_POST['pwd'];
	
	if ($op=='mod'){
		$cli->modificar($bd->link);
		echo "Yasta niquelao";
		echo "<a href='clientes.php'>Volver</a>";}
	else {
		if ($cli->insertar($bd->link)){
						echo "Yasta niquelao";
			echo "<a href='clientes.php'>Volver</a>";}
		else{
			echo "El dni ya existe";
			$cli->dniCliente='';
			formulario($op);
		}
	}
}

 // Liberamos los registros
 // Cerramos la conexion con la base de datos
}else
{
	echo "es necesario estar registrado";
	echo "<a href='index.php'>login</a>";
}
?>