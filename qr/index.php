<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    INTRODUCE TUS DATOS<br><br><br><hr>



    <form action="index.php" method="post">

    <label for="APTxt">Nombre: </label>
    <input id="nombre" name="nombre" value=""><br>
    <label for="APTxt">Apellido Paterno: </label>
    <input id="ap" name="ap" value=""><br>
    <label for="AMTxt">Apellido Materno: </label>
    <input id="am" name="am" value=""><br>
    <label for="ComTxt">Comentarios: </label>
    <input id="com" name="com" value=""><br>


    <input type="submit" name="generar" value="Generar" ></input>

  </form>

    <?php


    if (isset($_REQUEST['generar'])) {

      if (trim($_REQUEST['nombre']) == ''){
          echo '<hr>Te falta almacenar un dato';
        }
      else if (trim($_REQUEST['ap']) == ''){
          echo '<hr>Te falta almacenar un dato';
        }
      else if (trim($_REQUEST['am']) == ''){
          echo '<hr>Te falta almacenar un dato';
        }
      else if (trim($_REQUEST['com']) == ''){
          echo '<hr>Te falta almacenar un dato';
        }
      else{


    $nombre = $_REQUEST['nombre'];
    $ap = $_REQUEST['ap'];
    $am = $_REQUEST['am'];
    $com = $_REQUEST['com'];

    echo "<hr>";

      include "nombre.php";
      $filename = nombre::nombrem();



      include "genqr.php";
      genqr::genqrm($nombre, $ap, $am, $com, $filename);

      include "bd.php";
      bd::bdm($nombre, $ap, $am, $com, $filename);
    }

      }
  ?>

  </body>
</html>
