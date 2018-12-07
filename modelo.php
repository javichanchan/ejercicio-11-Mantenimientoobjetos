<?php  
class base 
{ 
    private $link; 

    public function __construct() 
    { 
       if (!isset($this->link)) {
                 
        $this->link = new mysqli('localhost', 'root', 'root', 'virtualmarket'); 

        if ( $this->link->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->link->connect_error; 
            return;     
        } 

        $this->link->set_charset('utf-8'); 
        }
    }
    public function __get($var){         
        if (property_exists(__CLASS__, $var)){   
            return $this->$var;         
        }         
        return NULL;     
    } 
}  

class cliente  
{     
    private $dniCliente;
    private $nombre;
    private $direccion;
    private $email;
    private $pwd;

    public function __construct() 
    { 
        
    }
    public function borrar($link) 
    { 
      $link->query("DELETE FROM clientes WHERE dniCliente='$this->dniCliente'");  
    }
    public function validar($link)
    {
        $consul="SELECT * FROM clientes WHERE dniCliente='$this->dniCliente' and pwd='$this->pwd'";
            $result=$link->query($consul);
            return $result->fetch_assoc();
    } 
    public function cargar($fila){
        $this->dniCliente=$fila['dniCliente'];
        $this->nombre=$fila['nombre'];
        $this->direccion=$fila['direccion'];
        $this->email=$fila['email'];
        $this->pwd=$fila['pwd'];
    }
    public function linea(){
    echo "<tr>";
    echo "<td>$this->dniCliente</td>";
    echo "<td>$this->nombre</td>";
    echo "<td>$this->direccion</td>";
    echo "<td>$this->email</td>";
    echo "<td>$this->pwd</td>";
    echo "<td><a href='modalta.php?op=mod&dni=$this->dniCliente'>modificar</a></td>";
    echo "<td><a href='borrar.php?dni=$this->dniCliente'>borrar</a></td>";
    echo "<td><a href='detalle.php?dni=$this->dniCliente'>detalle</a></td>";
    echo "</tr>";
    }
    public function detalle(){
    echo "<table>";
    
    echo "<tr><td>dniCliente</td><td>$this->dniCliente</td></tr>";
    echo "<tr><td>nombre</td><td>$this->nombre</td></tr>";
    echo "<tr><td>direccion</td><td>$this->direccion</td></tr>";
    echo "<tr><td>email</td><td>$this->email</td></tr>";
    echo "<tr><td>pwd</td><td>$this->pwd</td></tr>";
    
    
    echo "</table>";
}


    public function insertar($link) 
    { 
       if (!$this->consultar($link)) {
        $result = $link->query("INSERT INTO clientes VALUES ('$this->dniCliente','$this->nombre','$this->direccion','$this->email','$this->pwd')");
            return True; 
         }else return False;
    } 
    public function modificar($link) 
    { 
       
        $result = $link->query("UPDATE clientes SET  nombre='$this->nombre', direccion='$this->direccion', email='$this->email', pwd='$this->pwd' WHERE dniCliente='$this->dniCliente'");
            
    } 
    public function consultar($link) 
    { 
        $result = $link->query("SELECT * FROM clientes WHERE dniCliente='$this->dniCliente'"); 
        return $result->fetch_assoc();
    } 
     public function __set($var, $valor){
             if (property_exists(__CLASS__, $var)){   
                $this->$var = $valor;           
            } else   echo "No existe el atributo $var.";    
        }    
     public function __get($var){         
        if (property_exists(__CLASS__, $var)){   
            return $this->$var;         
        }         
        return NULL;     
    } 
} 
  
?> 