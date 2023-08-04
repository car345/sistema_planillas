$(document).ready(function(){
    $('#data_table').Tabledit({
    deleteButton: false,
    editButton: false,
    columns: {
    identifier: [0, 'REGISTRO'],
    editable: [[1, 'id_importe'], [2, 'id_aportes'], [3, 'costo']]
    },
    hideIdentifier: true,
    url: '../../Vistass/Meses/armarplanilla/live_edit.php'
    });
    });