<?php
    include('layout/header.php');
    include('layout/sidebar.php');
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="content">
                <?php
                    if(isset($_POST['input'])){
                        $kode_barang    = $_POST['kode_barang'];
                        $nama_barang    = $_POST['nama_barang'];
                        $harga_barang   = $_POST['harga_barang'];
                        $stok_barang    = $_POST['stok_barang'];
                        $kode_jenis     = $_POST['kode_jenis'];
                        
                        $cek = mysqli_query($koneksi, "SELECT * FROM data WHERE kode_barang='$nim'");
                        if(mysqli_num_rows($cek) == 0){
                                $insert = mysqli_query($koneksi, "INSERT INTO data(kode_barang, nama_barang, harga_barang, stok_barang, kode_jenis)
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
                
                <form name="form1" id="form1" class="form-horizontal row-fluid" action="input.php" method="POST" >
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
            </div>
            <!--/.content-->
        </div>
        <!--/.span9-->
    </div>
</div>
<!--/.container-->
        
<?php
    include('layout/footer.php');
?>