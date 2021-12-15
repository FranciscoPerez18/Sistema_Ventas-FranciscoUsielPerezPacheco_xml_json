<?php
$conexion=mysqli_connect("localhost", "root", "", "sistema-franciscoperez"); //creamos conexion
 
if(!$conexion){
    echo "ERROR AL CONECTAR...";
}
else{
$result=mysqli_query($conexion, "Select * from producto"); //realizamos una consulta

$xml = new DOMDocument("1.0");
 

$xml->formatOutput=true; //Formato de XML
$producto1=$xml->createElement("PRODUCTOS");
$xml->appendChild($producto1);

while($row=mysqli_fetch_array($result)){
    $usuario=$xml->createElement("producto");
    $producto1->appendChild($usuario);
     
    $descripcion=$xml->createElement("descripcion", $row['descripcion']);
    $usuario->appendChild($descripcion);
     
    $prov=$xml->createElement("proveedor", $row['proveedor']);
    $usuario->appendChild($prov);
     
    $precio=$xml->createElement("precio", $row['precio']);
    $usuario->appendChild($precio);
     
    $existencia=$xml->createElement("existencia", $row['existencia']);
    $usuario->appendChild($existencia);
     
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("reporte_producto.xml");
}
?>