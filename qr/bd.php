<?php

class bd{

  public static function bdm($nombre, $ap, $am, $com, $filename){


$hostname = 'http://www.meetingrooms.com.mx';
$database = 'meetingr_qr';
$username = 'meetingr_qradmin';
$password = 'Qradmin123';

$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexion a MySQL: (" . $mysqli -> mysqli_connect_errno()
. ") " . $mysqli -> mysqli_connect_error());
}
else


$filename = $filename.'.png';

if ($mysqli->query("INSERT INTO qr (Nombre,ApellidoP,ApellidoM,Comentario,img) values('$nombre','$ap','$am','$com','$filename')") === TRUE) {
printf($mysqli->affected_rows);
}
else
echo "Error al ejecutar el comando:".$mysqli->error;



}

}

?>
