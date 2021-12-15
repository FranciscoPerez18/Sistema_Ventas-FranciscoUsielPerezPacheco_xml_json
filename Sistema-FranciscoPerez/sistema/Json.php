<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "sistema-franciscoperez";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM usuario";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$usuario1 = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
 
    $nombre=$row['nombre'];
    $correo=$row['correo'];
    $usuario=$row['usuario'];
    $clave=$row['clave'];
 

    $usuario1[] = array('nombre'=> $nombre, 'correo'=> $correo, 'usuario'=> $usuario, 'clave'=> $clave);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($usuario1);
echo $json_string;


$file = 'reporte_usuario.json';
file_put_contents($file, $json_string);
  
?>