<?php
    include('layout/header.php');
    include('layout/sidebar.php');

    $get = (isset($_GET['get']) ? $_GET['get'] : '');
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="content">
                <?php
                if ($get == 'data_barang') {

                    if(isset($_POST['input'])){
                        $kode_barang    = $_POST['kode_barang'];
                        $nama_barang    = $_POST['nama_barang'];
                        $harga_barang   = $_POST['harga_barang'];
                        $stok_barang    = $_POST['stok_barang'];
                        $kode_jenis     = $_POST['kode_jenis'];
                        
                        $cek = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang='$kode_barang'");
                        if(mysqli_num_rows($cek) == 0){
                                $insert = mysqli_query($conn, "INSERT INTO barang(kode_barang, nama_barang, harga_barang, stok_barang, kode_jenis)
                                                                    VALUES('$kode_barang','$nama_barang', '$harga_barang', '$stok_barang', '$kode_jenis')") or die(mysqli_error());
                                if($insert){
                                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
                                }else{
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
                                }
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Barang Sudah Ada..!</div>';
                        }
                    }
                    ?>
    
                    <blockquote>
                    Input Data Barang
                    </blockquote>
                    
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="input.php?get=data_barang" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Kode Barang</label>
                            <div class="controls">
                                <input type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nama Barang</label>
                            <div class="controls">
                                <input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Harga Barang</label>
                            <div class="controls">
                                <input type="text" name="harga_barang" id="harga_barang" placeholder="Harga Barang" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Stok Barang</label>
                            <div class="controls">
                                <input type="text" name="stok_barang" id="stok_barang" placeholder="Stok Barang" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Jenis Barang</label>
                            <div class="controls">
                                <select name="kode_jenis" id="kode_jenis" class="form-control span8 tip" required>
                                    <?php
                                        $sql   = "SELECT * FROM jenis_barang";
                                        $query = mysqli_query($conn, $sql);

                                        while( $row=mysqli_fetch_array($query) ){
                                            echo "<option value='".$row["kode_jenis"]."'>".$row["jenis_barang"]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="control-group">
                            <label class="control-label" for="basicinput">Tanggal Lahir</label>
                            <div class="controls">
                                <input name="tanggal_lahir" id="tanggal_lahir" class="form-control span8 tip" type="text" placeholder="yyyy/mm/dd" required />
                            </div>
                        </div> -->

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Simpan</button>
                                <a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

                    <?php
                }elseif ($get == 'jenis_barang') {
                    if(isset($_POST['input'])){
                        $kode_jenis   = $_POST['kode_jenis'];
                        $jenis_barang = $_POST['jenis_barang'];
                        
                        $cek = mysqli_query($conn, "SELECT * FROM jenis_barang WHERE kode_jenis='$kode_jenis'");
                        if(mysqli_num_rows($cek) == 0){
                                $insert = mysqli_query($conn, "INSERT INTO jenis_barang(kode_jenis, jenis_barang)
                                                                    VALUES('$kode_jenis','$jenis_barang')") or die(mysqli_error());
                                if($insert){
                                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
                                }else{
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
                                }
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Barang Sudah Ada..!</div>';
                        }
                    }
                    ?>
    
                    <blockquote>
                    Input Data Jenis Barang
                    </blockquote>
                    
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="input.php?get=jenis_barang" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Kode Jenis</label>
                            <div class="controls">
                                <input type="text" name="kode_jenis" id="kode_jenis" placeholder="Kode Jenis" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Jenis Barang</label>
                            <div class="controls">
                                <input type="text" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Simpan</button>
                                <a href="jenis_barang.php" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

                    <?php
                }elseif ($get == 'data_penjualan') {
                    if(isset($_POST['input'])){
                        $kode_penjualan     = $_POST['kode_penjualan'];
                        $kode_barang        = $_POST['kode_barang'];
                        $tanggal_transaksi  = $_POST['tanggal_transaksi'];
                        $jumlah_terjual     = $_POST['jumlah_terjual'];
                        $total_harga        = $_POST['total_harga'];
                        
                        $cek = mysqli_query($conn, "SELECT * FROM penjualan WHERE kode_penjualan='$kode_penjualan'");
                        if(mysqli_num_rows($cek) == 0){
                                $insert = mysqli_query($conn, "INSERT INTO penjualan(kode_penjualan, kode_barang, tanggal_transaksi, jumlah_terjual, total_harga)
                                                                    VALUES('$kode_penjualan','$kode_barang', '$tanggal_transaksi', '$jumlah_terjual', '$total_harga')") or die(mysqli_error());
                                if($insert){
                                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
                                }else{
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
                                }
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Barang Sudah Ada..!</div>';
                        }
                    }
                    ?>
    
                    <blockquote>
                    Input Data Penjualan
                    </blockquote>
                    
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="input.php?get=data_penjualan" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Kode Penjualan</label>
                            <div class="controls">
                                <input type="text" name="kode_penjualan" id="kode_penjualan" placeholder="Kode Penjualan" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nama Barang</label>
                            <div class="controls">
                                <select name="kode_barang" id="kode_barang" class="form-control span8 tip" required>
                                    <?php
                                        $sql   = "SELECT * FROM barang";
                                        $query = mysqli_query($conn, $sql);

                                        while( $row=mysqli_fetch_array($query) ){
                                            echo "<option value='".$row["kode_barang"]."'>".$row["nama_barang"]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Tanggal Transaksi</label>
                            <div class="controls">
                                <input name="tanggal_transaksi" id="tanggal_transaksi" class="form-control span8 tip" type="date" placeholder="yyyy/mm/dd" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Jumlah Terjual</label>
                            <div class="controls">
                                <input type="text" name="jumlah_terjual" id="jumlah_terjual" placeholder="Jumlah Terjual" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Total Harga</label>
                            <div class="controls">
                                <input type="text" name="total_harga" id="total_harga" placeholder="Total Harga" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Simpan</button>
                                <a href="data_penjualan.php" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

                    <?php
                }
                ?>
            </div>
            <!--/.content-->
        </div>
        <!--/.span9-->
    </div>
</div>
<!--/.container-->

<script>
    //options method for call datepicker
    $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
</script>
        
<?php
    include('layout/footer.php');
?>