<?php

function existe ($cod){
	global $link;
	$consul="SELECT * FROM clientes where dniCliente='$cod'";
	$result = mysqli_query($link,$consul);
	$datos=mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $datos;
}


function titulo($f){
echo "<tr>";
foreach ($f as $nom=>$value) 	echo "<td>$nom</td>";
echo "<td><a href='modalta.php?op=alta'>alta</a></td>";
echo "<td></td>";
echo "<td><a href='salir.php'>salir</a></td>";
echo "</tr>";
}

function formulario($op){
	global $cli;
echo "<form action='' method ='post'>";
if ($op=='alta'){
	echo "Dni: <input type='text' name='dniCliente'><br>";
}else {
	echo  "Codigo: $cli->dniCliente <br>";
	echo "<input type='hidden' name='dniCliente' value='$cli->dniCliente'>";
}
echo "<input type='hidden' name='op' value='$op'>";
echo "nombre: <input type='text' name='nombre' value='$cli->nombre'><br>";
echo "direccion: <input type='text' name='direccion' value='$cli->direccion'><br>";
echo "email: <input type='text' name='email' value='$cli->email'><br>";
echo "pwd: <input type='text' name='pwd' value='$cli->pwd'><br>";
echo "<input type='submit' name='enviar' value='enviar'></form>";
}


?>