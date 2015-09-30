<?php

 class genqr{

   public static function genqrm($nombre, $ap, $am, $com, $filename){

    $QR_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'qrimg'.DIRECTORY_SEPARATOR;
    $HTML_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR;

    $QR_WEB_DIR = "qrimg/";
    $HTML_WEB_DIR = "html/";

    include "phpqrcode.php";


    if (!file_exists($QR_TEMP_DIR))
        mkdir($QR_TEMP_DIR);
    if (!file_exists($HTML_TEMP_DIR))
        mkdir($HTML_TEMP_DIR);



    $fileimg = $QR_TEMP_DIR.'test.png';



    $errorCorrectionLevel = 'Q';


    $matrixPointSize = 6;



    $filenameqr = $QR_WEB_DIR.$filename;
    $filenamehtml = $HTML_WEB_DIR.$filename;
    $fileimg = $filenameqr.'.png';
    $filehtml = $filenamehtml.'.html';
    $filehtmlqr = "192.168.1.5/demo/qr/".$filehtml;

  


    QRcode::png($filehtmlqr, $fileimg, $errorCorrectionLevel, $matrixPointSize, 2);

         $mensaje = "

         <!DOCTYPE html>
         <html>
           <head>

             <title></title>
           </head>
           <body>

           Nombre: '$nombre' '$ap' '$am' <br><br>
          Comentario: '$com'

           </body>
         </html>

         ";

        if($archivo = fopen($filehtml, "a"))
        {
            fwrite($archivo, $mensaje);

            fclose($archivo);
        }

    echo '<img src="'.$QR_WEB_DIR.basename($fileimg).'" />


    <br>Datos guardados <a href="./index.php">Regresar</a><br>';

    return $fileimg;
}
}
    ?>
