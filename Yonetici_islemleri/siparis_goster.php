<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Sipari Bilgiler</h1>
        <br><br>


        <?php 
             if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sql = "SELECT * FROM  siparis_tbl WHERE Id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                { 
                    $row=mysqli_fetch_assoc($res);
                    $siparis_tarihi = $row['siparis_tarihi'];
                    $yemek_adi = $row['yemek_adi'];
                    $fiyat = $row['birim_fiyat'];
                    $adet = $row['adet'];
                    $toplam = $row['toplam'];
                    $durum = $row['durum'];
                    $musteri_adi = $row['musteri_adi'];
                    $musteri_tel = $row['musteri_tel'];
                    $musteri_email = $row['musteri_email'];
                    $musteri_adres= $row['musteri_adres'];
                    $ozellik = $row['notu'];
                }
                else
                {
                    header('location:'.SITEURL.'Yonetici_islemleri/siparis.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'Yonetici_islemleri/siparis.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-50">
             <tr>
                    <td>Siparis Tarihi</td>
                    <td><b> <?php echo $siparis_tarihi; ?> </b></td>
                </tr>
                <tr>
                    <td>Yemek Adi</td>
                    <td><b> <?php echo $yemek_adi; ?> </b></td>
                </tr>

                <tr>
                    <td>Birim Fiyat</td>
                    <td>
                        <b>  <?php echo $fiyat; ?> TL</b>
                    </td>
                </tr>

                <tr>
                    <td>Adet</td>
                    <td>
                     <b> <?php echo $adet; ?></b>
                        
                    </td>
                </tr>
                <td>Toplam :</td>
                    <td>
                     <b> <?php echo $toplam; ?></b>
                        
                    </td>
                
                </tr>
                
                <tr>
                    <td>Ozellik </td>
                    <td>
                        <b> <?php echo $ozellik; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Musteri Adi :</td>
                    <td>
                        <b> <?php echo $musteri_adi; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Tel NO :</td>
                    <td>
                        <b> <?php echo $musteri_tel; ?></b>
                    
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Email : </td>
                    <td>
                        <b> <?php echo $musteri_email; ?></b>
                    </td>
                </tr>
                 <tr>
                    <td>Adres :</td>
                    <td>
                        <b> <?php echo $musteri_adres; ?></b>
                    </td>
                </tr>
                <tr>
                    <td>Siparis Durumu</td>
                    <td>
                        <select name="durum">
                            <option <?php if($durum=="Teslim Ediledi"){echo "selected";} ?> value="Teslim Ediledi">Teslim Ediledi</option>
                            <option <?php if($durum=="Daha Teslim Edilmedi"){echo "selected";} ?> value="Daha Teslim Edilmedi">Daha Teslim Edilmedi</option>
                            <option <?php if($durum=="Teslimat Siparislerinde"){echo "selected";} ?> value="Teslimat Siparislerinde">Teslimat Siparislerinde</option>
                            <option <?php if($durum=="Iptal Edilen Siparisler"){echo "selected";} ?> value="Iptal Edilen Siparisler">Iptal Edilen Siparisler</option>
                        </select>
                    </td>
                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Siparis Guncell" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $durum = $_POST['durum'];
                $sql2 = "UPDATE siparis_tbl SET 
                    durum = '$durum'
                    WHERE Id=$id ";
                $res2 = mysqli_query($conn, $sql2);
                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Siparis Basariyla Guncellendi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/siparis.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Siparis Guncellenemedi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/siparis.php');
                }
            }
        ?>


    </div>
</div>

<?php include('alt_bilgi.php'); ?>
