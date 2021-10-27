<?php
    include('layout/header.php');
    include('layout/sidebar.php');
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="content">
                <?php
                    if(isset($_GET['act']) == 'hapus'){
                        $kd_jenis = $_GET['kd'];
                        $cek     = mysqli_query($conn, "SELECT * FROM jenis_barang WHERE kode_jenis='$kd_jenis'");
                        if(mysqli_num_rows($cek) == 0){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                        }else{
                            $delete = mysqli_query($conn, "DELETE FROM jenis_barang WHERE kode_jenis='$kd_jenis'");
                            if($delete){
                                echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                            }else{
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                            }
                        }
                    }
                ?>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-user"></i> Data Jenis Barang</h3> 
                    </div>
                    <div class="panel-body">
                        <table id="lookup" class="table table-bordered table-hover">  
                            <thead bgcolor="#eeeeee" align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Jenis </th>
                                    <th>Jenis Barang </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="pull-right">
                            <a href="input.php?get=jenis_barang" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>
                </div>
                    
            </div>
            <!--/.content-->
        </div>
        <!--/.span12-->
    </div>
</div>
<!--/.container-->

<script>
    //options method for call datepicker
    $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
    
    $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                url :"ajax-grid-data.php?kd=jenis_barang", // json datasource
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

<?php
    include('layout/footer.php');
?>