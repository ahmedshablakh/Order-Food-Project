 <?php include('menuler.php'); ?>

    <section class="food-search text-center">
        <div class="container">
            <?php 

            
                $ara = $_POST['ara'];
            
            ?>


            <h2><a href="#" class="text-white"> Aramanizdaki Yemekler "<?php echo $ara; ?>"</a></h2>

        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Yemek Menusu</h2>

            <?php 

              
                $sql = "SELECT * FROM yemek_tbl WHERE (yemek_adi LIKE '%$ara%' OR yemek_ozellekler LIKE '%$ara%' ) and aktif ='EVET' ";

                
                $res = mysqli_query($conn, $sql);

                
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
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
                            <br/>

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