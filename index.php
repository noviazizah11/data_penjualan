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
                        $kd_brg = $_GET['kd'];
                        $cek     = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang='$kd_brg'");
                        if(mysqli_num_rows($cek) == 0){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                        }else{
                            $delete = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang='$kd_brg'");
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
                        <h3 class="panel-title"><i class="icon-user"></i> Data Barang</h3> 
                    </div>
                    <div class="panel-body">
                        <table id="lookup" class="table table-bordered table-hover">  
                            <thead bgcolor="#eeeeee" align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang </th>
                                    <th>Nama Barang </th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang </th>
                                    <th>Jenis Barang</th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="pull-right">
                            <a href="input.php" class="btn btn-sm btn-primary">Tambah Data</a>
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

<?php
    include('layout/footer.php');
?>