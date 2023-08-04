<?php 
    include '../../../../conecta.php';
    if(isset($_POST))
    {
        $ID_PARTIDAS=$_POST['ID_PARTIDAS'];
        $CODIGO=$_POST['CODIGO'];
        $FORMULA=$_POST['FORMULA'];
        $AUXILIAR=$_POST['AUXILIAR'];
        $FORMULARIO=$_POST['FORMULARIO'];
        $NOMBRE=$_POST['NOMBRE'];
        $query ="INSERT INTO partidas(REGISTRO,CODIGO,FORMULA,AUXILIAR,FORMULARIO,NOMBRE) VALUES('$ID_PARTIDAS','$CODIGO','$FORMULA',
        '$AUXILIAR','$FORMULARIO','$NOMBRE')";
        $resultado= mysqli_query($conn,$query);
        echo "ok";  
     }
?>