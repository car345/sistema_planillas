$(document).ready(function(){
$('#data_tableD').Tabledit({
    deleteButton: false,
    editButton: false,
    columns: {
        identifier: [0, 'id_registro'],
        editable: [[1, 'CODIGO'], [2, 'NOMBRE'], [3,'IMPORTE']]
    },
    hideIdentifier: true,
    url: './armarplanilla/live_editD.php'
    });

});