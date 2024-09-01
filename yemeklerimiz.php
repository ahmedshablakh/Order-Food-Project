 <?php include('menuler.php'); ?>
 
 
 <!-- yemek menusu -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center"> YEMEKLERIMIZ </h2>

            <?php 
            
            
            $sql2 = "SELECT * FROM yemek_tbl WHERE aktif='EVET'";

            
            $res2 = mysqli_query($conn, $sql2);

            
            $count2 = mysqli_num_rows($res2);

            
            if($count2>0)
            {
            
                while($row=mysqli_fetch_assoc($res2))
                {
                    
                    $id = $row['Id'];
                    $yemek_adi = $row['yemek_adi'];
                    $fiyat = $row['birim_fiyat'];
                    $yemek_ozellekler = $row['yemek_ozellekler'];
                    $fot_adi = $row['fot_adi'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                
                                if($fot_adi=="")
                                {
                                    
                                    echo "<div class='error'> Resim mevcut degil. </div>";
                                }
                                else
                                {
                                    
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $fot_adi; ?>" alt=" Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $yemek_adi; ?></h4>
                            <p class="food-price"><?php echo $fiyat; ?>  TL</p>
                            <p class="food-detail">
                                <?php echo $yemek_ozellekler; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>siparis.php?yemek_id=<?php echo $id; ?>" class="btn btn-primary">Simdi siparis ver</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
            
                echo "<div class='error'>Yiyecek mevcut degil..</div>";
            }
            
            ?>
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>yemeklerimiz.php">Tum Yiyecekleri Gor</a>
        </p>
    </section>
    <!-- son yemek menusu -->
    <!-- Ali bilgiler -->
    
    
    <?php include('altbilgi.php'); ?>