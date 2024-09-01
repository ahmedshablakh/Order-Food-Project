
<?php include('menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Kontrol Paneli</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        
                        $sql = "SELECT * FROM urunler_tbl";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Gida Kategorileri
                </div>

                <div class="col-4 text-center">

                    <?php 
                        
                        $sql2 = "SELECT * FROM yemek_tbl";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Gidalar
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                       
                        $sql3 = "SELECT * FROM siparis_tbl";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Toplam Siparisler
                </div>
                 <div class="col-4 text-center">
                    
                    <?php 
                        
                        $sql4 = "SELECT SUM(toplam) AS TOPLAM FROM siparis_tbl WHERE durum='Teslim Ediledi'";
                        $res4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        $toplam = $row4['TOPLAM'];

                    ?>

                    <h1><?php echo $toplam; ?> TL </h1>
                    <br />
                    Elde Edilen Gelir
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                         
                        $sql6 = "SELECT * FROM siparis_tbl WHERE durum = 'Daha Teslim Edilmedi'";
                        $res6 = mysqli_query($conn, $sql6);
                        $count6 = mysqli_num_rows($res6);
                    ?>

                    <h1><?php echo $count6; ?></h1>
                    <br />
                    Bekleyen Siparisler
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                         
                        $sql7 = "SELECT * FROM siparis_tbl WHERE durum = 'Teslimat Siparislerinde'";
                        $res7 = mysqli_query($conn, $sql7);
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    Teslimat Siparislerinde
                </div>
                <div class="col-4 text-center">
                    
                    <?php 
                        
                        $sql7 = "SELECT * FROM siparis_tbl WHERE durum = 'Iptal Edilen Siparisler'";
                        $res7 = mysqli_query($conn, $sql7);
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    Iptal Edilen Siparisler
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                         
                        $sql8 = "SELECT * FROM admin_tbl";
                        $res8 = mysqli_query($conn, $sql8);
                        $count8 = mysqli_num_rows($res8);
                    ?>

                    <h1><?php echo $count8; ?></h1>
                    <br />
                    Sistem yoneticisi
                </div>

                <div class="clearfix"></div>

            </div>
        </div>

<?php include('alt_bilgi.php') ?>