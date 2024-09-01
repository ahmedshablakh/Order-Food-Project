<?php include('menuler.php'); ?>

    <!-- urunler goruntu-->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Cesitli Yemek Kategorilerini Kesfedin</h2>

            <?php 
             
                $sql = "SELECT * FROM urunler_tbl WHERE aktif='EVET' ";
               
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        $id = $row['Id'];
                        $urun_adi = $row['urun_adi'];
                        $fot_adi = $row['fot_adi'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>urunler_yemek.php?urun_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    
                                    if($fot_adi=="")
                                    {
                                        
                                        echo "<div class='error'> Resim mevcut degil.. </div>";
                                    }
                                    else
                                    {
                                        
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $fot_adi; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white" ><mark style="background-color:white;"><?php echo $urun_adi; ?></mark></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    
                    echo "<div class='error'> Urunler Eklenmedi .</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- son unler goruntu-->


 <?php include('altbilgi.php'); ?>