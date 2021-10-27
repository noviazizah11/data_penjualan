<?php
    include('layout/header.php');
    include('layout/sidebar.php');

    $get = $_GET['get'];
    $kd  = $_GET['kd'];
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="content">
                <?php
                if ($get == 'data_barang') {
                        $sql = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang='$kd'");
                        if(mysqli_num_rows($sql) == 0){
                            header("Location: index.php");
                        }else{
                            $row = mysqli_fetch_assoc($sql);
                        }
                    ?>

                    <blockquote>
                    Update Data Barang
                    </blockquote>

                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php?get=data_barang" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Kode Barang</label>
                            <div class="controls">
                                <input type="hidden" name="kode_barang" id="kode_barang" value="<?php echo $row['kode_barang']; ?>">
                                <input type="text" name="kode_barang" id="kode_barang" value="<?php echo $row['kode_barang']; ?>" placeholder="Kode Barang" class="form-control span8 tip" disabled>
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
                                            if($row2['kode_jenis'] == $row['kode_jenis']){echo('selected');}
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

                    <?php
                }elseif ($get == 'jenis_barang') {
                    $sql = mysqli_query($conn, "SELECT * FROM jenis_barang WHERE kode_jenis='$kd'");
                        if(mysqli_num_rows($sql) == 0){
                            header("Location: jenis_barang.php");
                        }else{
                            $row = mysqli_fetch_assoc($sql);
                        }
                    ?>

                    <blockquote>
                    Update Data Jenis Barang
                    </blockquote>

                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php?get=jenis_barang" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Kode Jenis</label>
                            <div class="controls">
                                <input type="hidden" name="kode_jenis" id="kode_jenis" value="<?php echo $row['kode_jenis']; ?>">
                                <input type="text" name="kode_jenis" id="kode_jenis" value="<?php echo $row['kode_jenis']; ?>" placeholder="Kode Jenis" class="form-control span8 tip" disabled>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nama Jenis</label>
                            <div class="controls">
                                <input type="text" name="jenis_barang" id="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" placeholder="Nama Jenis" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update" id="update" value="Update" class="btn btn-sm btn-primary"/>
                                <a href="jenis_barang.php" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

                    <?php
                }elseif ($get == 'data_penjualan') {
                    $sql = mysqli_query($conn, "SELECT * FROM penjualan WHERE kode_penjualan='$kd'");
                    if(mysqli_num_rows($sql) == 0){
                        header("Location: index.php");
                    }else{
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>

                <blockquote>
                Update Data Barang
                </blockquote>

                <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php?get=data_penjualan" method="POST" >
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Kode Penjualan</label>
                        <div class="controls">
                            <input type="hidden" name="kode_penjualan" id="kode_penjualan" value="<?php echo $row['kode_penjualan']; ?>">
                            <input type="text" name="kode_penjualan" id="kode_penjualan" value="<?php echo $row['kode_penjualan']; ?>" placeholder="Kode Penjualan" class="form-control span8 tip" disabled>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Nama Barang</label>
                        <div class="controls">
                            <select name="kode_barang" id="kode_barang" class="form-control span8 tip" required>
                                <?php
                                    $sql   = "SELECT * FROM barang";
                                    $query = mysqli_query($conn, $sql);

                                    while( $row2=mysqli_fetch_array($query) ){
                                        echo "<option value='".$row2["kode_barang"]."'";
                                        if($row2['kode_barang'] == $row['kode_barang']){echo('selected');}
                                        echo ">".$row2["nama_barang"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Tanggal Transaksi</label>
                        <div class="controls">
                            <input name="tanggal_transaksi" id="tanggal_transaksi" class="form-control span8 tip" type="date" value="<?php echo $row['tanggal_transaksi']; ?>" placeholder="yyyy/mm/dd" required />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Jumlah Terjual</label>
                        <div class="controls">
                            <input type="text" name="jumlah_terjual" id="jumlah_terjual" value="<?php echo $row['jumlah_terjual']; ?>" placeholder="Jumlah Terjual" class="form-control span8 tip" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Total Harga</label>
                        <div class="controls">
                            <input name="total_harga" id="total_harga" value="<?php echo $row['total_harga']; ?>" class="form-control span8 tip" type="text" placeholder="Total Harga" required />
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" name="update" id="update" value="Update" class="btn btn-sm btn-primary"/>
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
        
<?php
    include('layout/footer.php');
?>