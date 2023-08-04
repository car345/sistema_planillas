<?php
//Se encarga de revisar si alguna celda de la tabla se editó. Hace una consulta UPDATE con el dato modificado
include_once("../../../../conecta.php");
$input = filter_input_array(INPUT_POST);
$update_field='';

    $update_field='';
    if(isset($input['IMPORTE'])) {
        $update_field.= "IMPORTE='".$input['IMPORTE']."'";
    }

    if($update_field!='' && $input['id_registro']!='') {
        $sql_query = "UPDATE reportxmes SET $update_field WHERE id_registro='" . $input['id_registro'] . "'";
        mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    }

?>