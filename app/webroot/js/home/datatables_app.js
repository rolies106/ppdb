jQuery(document).ready(function(){
   oTable = jQuery('.listing').dataTable({
				"sPaginationType": "full_numbers",
				"bSort": true,
				"oLanguage": {
						"sLengthMenu": "Tampilkan _MENU_ data per halaman",
						"sZeroRecords": "Tidak ada data",
						"sSearch" : "Cari di setiap kolom",
						"sInfo": "Menampilkan data ke _START_ sampai _END_ dari _TOTAL_ data",
						"sInfoEmpty": "Tidak ada data",
						"sInfoFiltered": "(Di filter dari _MAX_ total data)",
						"oPaginate": {
							"sFirst": "<<",
							"sLast" : ">>",
							"sNext" : ">",
							"sPrevious" : "<"
						}
				}
		    });
	oTable.fnSort([[0,'asc']]); 
});