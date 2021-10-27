<?php
    include('layout/header.php');
    include('layout/sidebar.php');
?>

<div class="container">

    <div class="row">
        <div class="col-md-6">

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="perbandingan_penjualan.php" method="POST" >
                <div class="control-group">
                    <label class="control-label" for="basicinput">Start Date</label>
                    <div class="controls">
                        <input name="start_date" id="start_date" class="form-control span8 tip" type="date" placeholder="yyyy/mm/dd" />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">End Date</label>
                    <div class="controls">
                        <input name="end_date" id="end_date" class="form-control span8 tip" type="date" placeholder="yyyy/mm/dd" />
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Filter</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="span12">
                        
            <div class="content">                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-user"></i> Perbandingan Penjualan</h3> 
                    </div>
                    <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <blockquote>
                                3 Penjualan Terbanyak
                                </blockquote>

                                <table class="table table-bordered table-hover">  
                                    <thead bgcolor="#eeeeee" align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang </th>
                                            <th>Nama Barang </th>
                                            <th>Jumlah Terjual </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_POST['input'])){
                                            $start_date = $_POST['start_date'];
                                            $end_date   = $_POST['end_date'];
                                            
                                            $sql = "SELECT a.*,b.`nama_barang`, sum(a.`jumlah_terjual`) sum_jt
                                            FROM `penjualan` as a
                                            left join barang as b on a.`kode_barang`=b.`kode_barang`
                                            WHERE a.`tanggal_transaksi` BETWEEN '".$start_date."' AND '".$end_date."'
                                            GROUP BY a.kode_barang
                                            ORDER BY sum_jt DESC LIMIT 3";
                                            $query = mysqli_query($conn, $sql);

                                            if(mysqli_num_rows($query) != 0){
                                                $no=1;
                                                while( $row=mysqli_fetch_array($query) ) {  // preparing an array

                                                    echo "<tr>";
                                                    echo "<td>".$no."</td>";
                                                    echo "<td>".$row["kode_barang"]."</td>";
                                                    echo "<td>".$row["nama_barang"]."</td>";
                                                    echo "<td>".$row["sum_jt"]."</td>";
                                                    echo "</tr>";
                                            
                                                    $no++;
                                                }
                                            }else{
                                                echo "<tr><th colspan='4'>No data found in the server</th></tr>";
                                            }
                                        }else{
                                            echo "<tr><th colspan='4'>No data found in the server</th></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <blockquote>
                                3 Penjualan Terendah
                                </blockquote>

                                <table class="table table-bordered table-hover">  
                                    <thead bgcolor="#eeeeee" align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang </th>
                                            <th>Nama Barang </th>
                                            <th>Jumlah Terjual </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(isset($_POST['input'])){
                                            $start_date = $_POST['start_date'];
                                            $end_date   = $_POST['end_date'];
                                            
                                            $sql = "SELECT a.*,b.`nama_barang`, sum(a.`jumlah_terjual`) sum_jt
                                            FROM `penjualan` as a
                                            left join barang as b on a.`kode_barang`=b.`kode_barang`
                                            WHERE a.`tanggal_transaksi` BETWEEN '".$start_date."' AND '".$end_date."'
                                            GROUP BY a.kode_barang
                                            ORDER BY sum_jt ASC LIMIT 3";
                                            $query = mysqli_query($conn, $sql);

                                            if(mysqli_num_rows($query) != 0){
                                                $no=1;
                                                while( $row=mysqli_fetch_array($query) ) {  // preparing an array

                                                    echo "<tr>";
                                                    echo "<td>".$no."</td>";
                                                    echo "<td>".$row["kode_barang"]."</td>";
                                                    echo "<td>".$row["nama_barang"]."</td>";
                                                    echo "<td>".$row["sum_jt"]."</td>";
                                                    echo "</tr>";
                                            
                                                    $no++;
                                                }
                                            }else{
                                                echo "<tr><th colspan='4'>No data found in the server</th></tr>";
                                            }
                                        }else{
                                            echo "<tr><th colspan='4'>No data found in the server</th></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
</script>

<?php
    include('layout/footer.php');
?>