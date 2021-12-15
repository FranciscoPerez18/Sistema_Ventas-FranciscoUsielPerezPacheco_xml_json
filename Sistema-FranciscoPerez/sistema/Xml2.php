<?php
$conexion=mysqli_connect("localhost", "root", "", "sistema-franciscoperez"); //creamos conexion
 
if(!$conexion){
    echo "ERROR AL CONECTAR...";
}
else{
$result=mysqli_query($conexion, "Select * from cliente"); //realizamos una consulta

$xml = new DOMDocument("1.0");
 

$xml->formatOutput=true; //Formato de XML
$cliente1=$xml->createElement("CLIENTES");
$xml->appendChild($cliente1);

while($row=mysqli_fetch_array($result)){
    $usuario=$xml->createElement("cliente");
    $cliente1->appendChild($usuario);
     
    $nom=$xml->createElement("nombre", $row['nombre']);
    $usuario->appendChild($nom);
     
    $telefono=$xml->createElement("telefono", $row['telefono']);
    $usuario->appendChild($telefono);
     
    $direccion=$xml->createElement("direccion", $row['direccion']);
    $usuario->appendChild($direccion);
     
     
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("reporte_cliente.xml");
}
?>