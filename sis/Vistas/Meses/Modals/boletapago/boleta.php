<?php
include "../../../../../conecta.php";

if (!empty($_POST['cl'])) {
    $cliente = $_POST['cl'];
    $mes = $_POST['mes'];

    $query = mysqli_query($conn, "SELECT * FROM persxmes p INNER JOIN datperso d ON p.REGISTRO = d.id_datperso WHERE p.REGMES = '$mes' AND d.NUMERO_DOC = '$cliente'");

    
    if ($query) {
        // La consulta se ejecutó correctamente, obtener los resultados
        $data = mysqli_fetch_assoc($query);
    
        if ($data === null) {
            $data = array(); // Establecer como un arreglo vacío si no hay resultados
        }
    } else {
        // Ocurrió un error en la consulta
        $data = array();

         // Establecer como un arreglo vacío en caso de error
    }
    if (empty($data)) {
        // No hay datos, enviar una respuesta con estado de error
        http_response_code(204); // Sin contenido

    } else {
        // Codificar los datos como JSON y enviar la respuesta
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}

        

    
?>