<?php
//Se encarga de revisar si alguna celda de la tabla se editó. Hace una consulta UPDATE con el dato modificado
include_once("../../../../conecta.php");
$input = filter_input_array(INPUT_POST);
$id_user=$_GET['id'];

$update_field='';

    $update_field='';
    if(isset($input['CODIGO'])) {
        $update_field.= "CODIGO='".$input['CODIGO']."'";
    } else if(isset($input['DESCT'])) {
        $update_field.= "DESCT='".$input['DESCT']."'";
    } else if(isset($input['IMPORTE'])) {
        $update_field.= "IMPORTE='".$input['IMPORTE']."'";
    }
    $sql_importe="IMPORTE='".$input['IMPORTE']."'";;
    if($update_field!='' && $input['id_registro']!='') {
  
        $sql_query = "UPDATE reportxmes SET $update_field WHERE id_registro='" . $input['id_registro'] . "'";
        
        $select="SELECT*FROM reportxmes where id_registro='" . $input['id_registro'] . "'";
        $result=mysqli_query($conn,$select);
        $cs=mysqli_fetch_assoc($result);
        $cd=$cs['CODIGO'];

        $sql_formula="UPDATE formulaxmes SET $sql_importe where REGPERSON='$id_user' and CODIGO='$cd' ";
      

        mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
        mysqli_query($conn, $sql_formula) or die("database error:". mysqli_error($conn));
    }

?>