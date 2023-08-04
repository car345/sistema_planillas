<?php
include '../../../../conecta.php';
if(isset($_POST))
{
    
    $id=$_POST['idaportes'];
    $id_past=$_POST['id_past'];
    $categoria=$_POST['categoria'];
    $codigo=$_POST['codigo'];
    $cc=$_POST['cc'];
    $tcr=$_POST['tcr'];
    $glosa=$_POST['glosa'];
    $formula = $_POST['formula'];
    $imprimir=$_POST['imprimir'];
    $leer=$_POST['leer'];
    $ver=$_POST['ver'];
    $encargado=$_POST['encargado'];
    $auxiliar=$_POST['auxiliar'];
    $anular=$_POST['anular'];
    $afecto=$_POST['afecto'];
    $valorabsoluto=$_POST['valorabsoluto'];
    $inicializa=$_POST['inicializa'];
    $detalle=$_POST['detalle'];
    $traba_emp=$_POST['traba_emp'];
    $fecha=$_POST['fecha'];
    $fecha2=$_POST['fecha2'];

    $queryU = "UPDATE aportes SET  id_categori='$categoria', CODIGO='$codigo', CODIGOC='$cc', 
    TIPOCR='$tcr',`DESCT` ='$glosa', APORTE='$formula', IMP='$imprimir',
    LEE='$leer',VER='$ver',ENCARGADO='$encargado', AUXILIAR='$auxiliar',
    ANULAR='$anular',AFECTO='$afecto', VABSOLUTO='$valorabsoluto',
    INICIALIZA='$inicializa', DETALLE='$detalle', TRABA_EMP='$traba_emp', 
    FECHA='$fecha', FECHA2='$fecha2' WHERE REGISTRO='$id_past'";
    $resultado = mysqli_query($conn, $queryU);  
    echo "ok";

} 


?> 