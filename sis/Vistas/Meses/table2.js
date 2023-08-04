//Script que toma los datos editados de la tabla Dinámica
//Llama y envía valores a el archivo live_edit.php para actualizar la base de datos
$(document).ready(function(){
    var dato=$('#month3').val();
    var dato1=$('#month1').val();
    var url = new URL(window.location.href);

// Obtener los parámetros de la URL
var params = new URLSearchParams(url.search);

// Obtener el valor de "es"
var esValue = params.get('es');
if(esValue=='0')
{
    $('#data_table1').Tabledit({
    deleteButton: false,
    editButton: false,
    columns: {
    identifier: [0, 'id_registro'],
    editable: [ [3,'IMPORTE']]
    },
    hideIdentifier: true,
    url: './armarplanilla/live_edit1.php?id='+dato
    });
 } else{
    $('#data_table1').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
        identifier: [0, 'id_registro'],
        editable: []
        },
        hideIdentifier: true,
        url: './armarplanilla/live_edit1.php?id='+dato
        });
}
    });

 
