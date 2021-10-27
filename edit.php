<?php
    include('layout/header.php');
    include('layout/sidebar.php');
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="content">
                <?php
                    $kd = $_GET['kd'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM data WHERE kode_barang='$kd'");
                        if(mysqli_num_rows($sql) == 0){
                            header("Location: index.php");
                        }else{
                            $row = mysqli_fetch_assoc($sql);
                        }
                ?>

                <blockquote>
                Update Data Barang
                </blockquote>

                <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Kode Barang</label>
                        <div class="controls">
                            <input type="text" name="kode_barang" id="kode_barang" value="<?php echo $row['kode_barang']; ?>" placeholder="Kode Barang" class="form-control span8 tip" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Nama Barang</label>
                        <div class="controls">
                            <input type="text" name="nama_barang" id="nama_barang" value="<?php echo $row['nama_barang']; ?>" placeholder="Nama Barang" class="form-control span8 tip" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Harga Barang</label>
                        <div class="controls">
                            <input type="text" name="harga_barang" id="harga_barang" value="<?php echo $row['harga_barang']; ?>" placeholder="Harga Barang" class="form-control span8 tip" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Stok Barang</label>
                        <div class="controls">
                            <input name="stok_barang" id="stok_barang" value="<?php echo $row['stok_barang']; ?>" class="form-control span8 tip" type="text" placeholder="Stok Barang" required />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Jenis Barang</label>
                        <div class="controls">
                            <select name="kode_jenis" id="kode_jenis" class="form-control span8 tip" required>
                                <?php
                                    $sql   = "SELECT * FROM jenis_barang";
                                    $query = mysqli_query($conn, $sql);

                                    while( $row2=mysqli_fetch_array($query) ){
                                        echo "<option value='".$row2["kode_jenis"]."'"; 
                                        ($row2['kode_jenis'] == $row['kode_jenis']) ? 'selected' : '';
                                        echo ">".$row2["jenis_barang"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" name="update" id="update" value="Update" class="btn btn-sm btn-primary"/>
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