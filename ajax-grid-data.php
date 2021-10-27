<?php
/* Database connection start */
$servername = "localhost";
$username 	= "root";
$password 	= "";
$dbname 	= "data_penjualan";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* Database connection end */

// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;
$kd 		 = $_GET['kd'];

if ($kd == 'data_barang') {
	$columns = array( 
	// datatable column index  => database column name
		0 => 'kode_barang',
		1 => 'nama_barang', 
		2 => 'harga_barang',
		3 => 'stok_barang',
		4 => 'kode_jenis'
	);

	// getting total number records without any search
	$sql 			= "SELECT * FROM barang";
	$query			= mysqli_query($conn, $sql);
	$totalData 		= mysqli_num_rows($query);
	$totalFiltered 	= $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

	if( !empty($requestData['search']['value']) ) {
		// if there is a search parameter
		$sql = "SELECT * FROM barang";
		$sql.=" WHERE kode_barang LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR nama_barang LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR harga_barang LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR stok_barang LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR kode_jenis LIKE '".$requestData['search']['value']."%' ";
		$query = mysqli_query($conn, $sql);
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
		$query = mysqli_query($conn, $sql); // again run query with limit
		
	} else {	

		$sql = "SELECT * FROM barang";
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		$query=mysqli_query($conn, $sql);
		
	}

	$data = array();
	$no=1;
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 

		$nestedData[] = $no;
		$nestedData[] = $row["kode_barang"];
		$nestedData[] = $row["nama_barang"];
		$nestedData[] = $row["harga_barang"];
		$nestedData[] = $row["stok_barang"];
		$nestedData[] = $row["kode_jenis"];
		$nestedData[] = '<td><center>
						<a href="edit.php?kd='.$row['kode_barang'].'" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="menu-icon icon-pencil"></i> </a>
						<a href="index.php?act=hapus&kd='.$row['kode_barang'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
						</center></td>';
		$data[] = $nestedData;

		$no++;
	}
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>