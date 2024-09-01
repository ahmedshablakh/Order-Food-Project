
<?php include('p_menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Personel Kontrol Paneli</h1>
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
                       
                        $sql3 = "SELECT * FROM siparis_tbl";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Toplam Siparisler
                </div>

                <div class="clearfix"></div>

            </div>
        </div>

<?php include('alt_bilgi.php') ?>