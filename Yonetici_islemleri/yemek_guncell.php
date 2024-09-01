<?php include('menu.php'); ?>

<?php 
 
    if(isset($_GET['id']))
    {

        $id = $_GET['id'];


        $sql2 = "SELECT * FROM yemek_tbl WHERE Id=$id";       
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $yemek_adi = $row2['yemek_adi'];
        $ozellekler = $row2['yemek_ozellekler'];
        $fiyat = $row2['birim_fiyat'];
        $gecerli_resim = $row2['fot_adi'];
        $e_urun_id = $row2['urun_id'];
        $aktif = $row2['aktif'];

    }
    else
    {
        header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Yemek Guncelle</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Yemek Adi</td>
                <td>
                    <input type="text" name="yemek_adi" value="<?php echo $yemek_adi; ?>">
                </td>
            </tr>

            <tr>
                <td>Ozellikler</td>
                <td>
                    <textarea name="ozellikler" cols="30" rows="5"><?php echo $ozellekler; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Fiyat</td>
                <td>
                    <input type="number" name="fiyat" value="<?php echo $fiyat; ?>">
                </td>
            </tr>

            <tr>
                <td>Resim </td>
                <td>
                    <?php 
                        if($gecerli_resim== "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Resim Mevcut Degil.</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $gecerli_resim; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Resim Sec : </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Urun</td>
                <td>
                    <select name="kategori">

                            <?php 
                                
                                $sql = "SELECT * FROM urunler_tbl WHERE aktif='EVET'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $y_id = $row['Id'];
                                        $y_urun_adi = $row['urun_adi'];

                                        ?>

                                        <option <?php if( $e_urun_id==$y_id){echo "selected";} ?> value="<?php echo $y_id; ?>"><?php echo $y_urun_adi; ?></option>


                                        <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="0">Kategori Bulunamadi</option>
                                    <?php
                                }
                            ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Aktif :</td>
                <td>
                    <input <?php if($aktif=="EVET") {echo "checked";} ?> type="radio" name="aktif" value="EVET"> EVET 
                    <input <?php if($aktif=="HAYIR") {echo "checked";} ?> type="radio" name="aktif" value="HAYIR"> HAYIR 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Yemek Guncelle" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

     
        
        <?php 
            if(isset($_POST['submit']))
            {
                $yemek_adi = $_POST['yemek_adi'];
                $ozellikler = $_POST['ozellikler'];
                $fiyat = $_POST['fiyat'];
                $kategori = $_POST['kategori'];
                 $aktif = $_POST['aktif'];
                 
                if(isset($_FILES['image']['name']))
                {
                    //Upload BUtton Clicked
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        
                        $ext = end(explode('.', $image_name)); 

                        $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext; 
                        $src_path = $_FILES['image']['tmp_name']; 
                        $dest_path = "../images/food/".$image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Yeni Resim Yuklenemedi.</div>";
                            
                            header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
                            
                            die();
                        }
                        
                        if($current_image!="")
                        {
                           
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);


                            if($remove==false)
                            {
                               
                                $_SESSION['remove-failed'] = "<div class='error'>Mevcut resim kaldirilamadi.</div>";
                                
                                header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $gecerli_resim;
                    }
                }
                else
                {
                    $image_name = $gecerli_resim;
                }
                $sql2 = "UPDATE yemek_tbl SET 
                    yemek_adi = '$yemek_adi',
                    yemek_ozellekler = '$ozellikler',
                    birim_fiyat = $fiyat,
                    fot_adi = '$image_name',
                    urun_id = $kategori,
                    aktif = '$aktif'
                    WHERE Id=$id                    
                ";

                $res2 = mysqli_query($conn, $sql2);

                
                if($res2 == true)
                {
                   
                    $_SESSION['add'] = "<div class='success'>Yemek Basariyla Guncellendi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
                }
                else
                {
                    
                    $_SESSION['add'] = "<div class='error'>Yemek Guncellenemedi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
                }

                
            }

        ?>


    </div>
</div>

<?php include('alt_bilgi.php'); ?>