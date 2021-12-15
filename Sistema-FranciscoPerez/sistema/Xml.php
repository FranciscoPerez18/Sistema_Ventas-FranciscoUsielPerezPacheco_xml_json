<?php
include "../conexion.php";

 //$result=mysqli_query($conexion, "Select * from usuario"); //realizamos una consulta
 $result = mysqli_query($conexion, "SELECT * FROM usuario");
 
 $xml = new DOMDocument("1.0");
  
 
 $xml->formatOutput=true; //Formato de XML
 $usuario=$xml->createElement("USUARIO");
 $xml->appendChild($usuario);
 
 while($row=mysqli_fetch_array($result)){
     $usuario=$xml->createElement("usuarios");
     $usuario->appendChild($usuario);
      
     $nombre=$xml->createElement("NOMBRE", $row['nombre']);
     $usuario->appendChild($nombre);
      
     $correo=$xml->createElement("CORREO", $row['correo']);
     $usuario->appendChild($correo);
      
     $usuarios=$xml->createElement("USUARIO", $row['usuario']);
     $usuario->appendChild($usuarios);

     $clave=$xml->createElement("CLAVE", $row['clave']);
     $usuario->appendChild($clave);
      
     $rol=$xml->createElement("ROL", $row['rol']);
     $usuario->appendChild($rol);
      
 }
 echo "<xmp>".$xml->saveXML()."</xmp>";
 $xml->save("reporte_usuarios.xml");
 
 ?>