<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "sistema-franciscoperez";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM producto";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$producto1 = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
 
    $descripcion=$row['descripcion'];
    $prov=$row['proveedor'];
    $precio=$row['precio'];
    $existencia=$row['existencia'];
 

    $producto1[] = array('descripcion'=> $descripcion, 'proveedor'=> $prov, 'precio'=> $precio, 'existencia'=> $existencia);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($producto1);
echo $json_string;


$file = 'reporte_producto.json';
file_put_contents($file, $json_string);
  
?>