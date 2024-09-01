
<?php include('menuler.php'); ?>

    <?php 
        
        if(isset($_GET['yemek_id']))
        {
            
            $yemek_id = $_GET['yemek_id'];

            
            $sql = "SELECT * FROM yemek_tbl WHERE id=$yemek_id";
            
            $res = mysqli_query($conn, $sql);
            
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                
                $row = mysqli_fetch_assoc($res);

                $yemek_adi = $row['yemek_adi'];
                $birim_fiyat = $row['birim_fiyat'];
                $fot_adi = $row['fot_adi'];
            }
            else
            {
            
                header('location:'.SITEURL);
            }
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>

        <section class="food-search2">
        <div class="container">
            
            <h2 class="text-center text-white"> Siparisinizi onaylamak i�in bu formu doldurun.</h2>

            <form action="" method="POST" class="order" name="siparis">
                <fieldset>
                    <legend>Secilmis Yemek</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            
                            if($fot_adi=="")
                            {
                                
                                echo "<div class='error'>Image not Available.</div>";
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
                        <h3><?php echo $yemek_adi; ?></h3>
                        <input type="hidden" name="yemek_adi" value="<?php echo $yemek_adi; ?>"/>

                        <p class="food-price"><?php echo $birim_fiyat; ?> TL</p>
                        <input type="hidden" name="fiyat" value="<?php echo $birim_fiyat; ?>"/>

                        <div class="order-label">Miktar</div>
                        <input type="number" name="adet" class="input-responsive" value="1" required onchange="miktar(adet.value)">
                        <div class="order-label">Not Ekle</div>
                 <textarea name="notu" rows="4" class="input-responsive" required onblur="ozellik(notu.value)"></textarea>
                    </div>
					

                </fieldset>
                
                <fieldset>
                    <legend>Teslim Detaylari</legend>
                    <div class="order-label">Adi Soyadi</div>
                    <input type="text" name="adi_soyadi" placeholder="Ornegin. Adiniz Soyadiniz" class="input-responsive" required>

                    <div class="order-label">Telefon No</div>
                    <input type="tel" name="tel_no" placeholder="Ornegin. 05300000001" class="input-responsive" required onchange="tlno(tel_no.value)">

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Ornegin. aaa@gmail.com" class="input-responsive" required>

                    <div class="order-label">Adres</div>
                    <textarea name="adres" rows="10" placeholder="Ornegin. Sokak, Sehir, Ulke" class="input-responsive" required></textarea>
					

                    <input type="submit" name="gonder" value="Siparis Gonder" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                
                if(isset($_POST['gonder']))
                {
                    

                    $yemek_adi = $_POST['yemek_adi'];
                    $fiyat = $_POST['fiyat'];
                    $adet = $_POST['adet'];

                    $toplam = $birim_fiyat * $adet;

                    $siparis_tarihi = date("Y-m-d h:i:sa"); 

                    $durum = "Daha Teslim Edilmedi";  

                    $adi_soyadi = $_POST['adi_soyadi'];
                    $tel_no = $_POST['tel_no'];
                    $email = $_POST['email'];
                    $adres = $_POST['adres'];
                    $notu = $_POST['notu'];



                    $sql2 = "INSERT INTO siparis_tbl SET 
                        yemek_adi = '$yemek_adi',
                        birim_fiyat = $birim_fiyat,
                        adet = $adet,
                        toplam = $toplam,
                        siparis_tarihi = '$siparis_tarihi',
                        durum = '$durum',
                        musteri_adi = '$adi_soyadi',
                        musteri_tel = '$tel_no',
                        musteri_email = '$email',
                        musteri_adres = '$adres',
						notu = '$notu'
                    ";

                   
                    $res2 = mysqli_query($conn, $sql2);

                    

                    
                   if($res2==true)
                    {
                        
                       
                       $_SESSION['siparis'] = "<div class='success text-center'><h3> Basariyla Siparis Edildi...</h3></div>";
                        header('location:'.SITEURL);
                        
                    }
                    else
                    {
                        
                       $_SESSION['siparis'] = "<div class='error text-center'><h3>Yemek Siparisi Basarisiz...!</h3></div>";
                        header('location:'.SITEURL);

                    }
                    

                }
            
            
            ?>

        </div>
    </section>
     <!-- Ali bilgiler -->
    
    
    <?php include('altbilgi.php'); ?>