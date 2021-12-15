<?php
$conexion=mysqli_connect("localhost", "root", "", "sistema-franciscoperez"); //creamos conexion
 
if(!$conexion){
    echo "ERROR AL CONECTAR...";
}
else{
$result=mysqli_query($conexion, "Select * from usuario"); //realizamos una consulta

$xml = new DOMDocument("1.0");
 

$xml->formatOutput=true; //Formato de XML
$usuario1=$xml->createElement("USUARIO");
$xml->appendChild($usuario1);

while($row=mysqli_fetch_array($result)){
    $usuario=$xml->createElement("usuarios");
    $usuario1->appendChild($usuario);
     
    $nom=$xml->createElement("nombre", $row['nombre']);
    $usuario->appendChild($nom);
     
    $correo=$xml->createElement("correo", $row['correo']);
    $usuario->appendChild($correo);
     
    $usu=$xml->createElement("usuario", $row['usuario']);
    $usuario->appendChild($usu);
     
    $clave=$xml->createElement("clave", $row['clave']);
    $usuario->appendChild($clave);
     
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("reporte_usuario.xml");
}
?>