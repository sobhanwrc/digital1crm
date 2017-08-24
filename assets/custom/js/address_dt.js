$(document).ready(function() {
	//alert(BASE_URL);
    $('#sample_22').DataTable( {
        
		//"bFilter": true,
		"aoColumnDefs": [{'bSortable': false, 'aTargets': [0], 'orderable': false, 'targets': 0}, {'bSortable': false, 'aTargets': [6], 'orderable': false, 'targets': 6}],
		//"aaSorting": [[column_index, "asc"]],
		//"bPaginate": true,
		"processing": true,
		"oLanguage": {
		    sProcessing: "<img src=" + BASE_URL + "assets/custom/img/FhHRx.gif>"
		},
		//"sDom": 'T<"col-sm-12 datatables-footer"lfr,i><"col-sm-12 datatables-footer""bottom"flp,i>',
		//"deferRender": true,
		"serverSide": true,
		//"bStateSave": savestate,
		'iDisplayLength': 10,
		//'bLengthChange': true,
		//"sPaginationType": "full_numbers",
		"lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "All"]],
		"ajax": {
		    "url": BASE_URL + "city_state_country/fetch_datatable",
		    "type": "POST"
		}
            
    } );
} );