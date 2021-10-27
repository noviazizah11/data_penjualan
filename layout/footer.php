<!--/.wrapper--><br />
<div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href="#"> Data Penjualan</a> &copy; 2021 </b></center>
            </div>
        </div>

        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>        
        <script src="assets/datatables/jquery.dataTables.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script>
            //options method for call datepicker
            $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
			
            $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-grid-data.php?kd=data_barang", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="7">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			});
        </script>
      
    </body>
</html>