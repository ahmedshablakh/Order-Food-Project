<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Yemek Ekle</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Yemek Adi  </td>
                    <td>
                        <input type="text" name="yemek_adi" placeholder="Yemek Adi ">
                    </td>
                </tr>

                <tr>
                    <td>Ozellikler </td>
                    <td>
                        <textarea name="ozellikler" cols="30" rows="5" placeholder="Ozellikler."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Fiyat  </td>
                    <td>
                        <input type="number" name="fiyat" placeholder="00.00">
                    </td>
                </tr>

                <tr>
                    <td>Resim Sec : </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Urun </td>
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
                                        $id = $row['Id'];
                                        $urun_adi = $row['urun_adi'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $urun_adi; ?></option>

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
                    <td>Aktif : </td>
                    <td>
                        <input type="radio" name="aktif" value="EVET"> EVET 
                        <input type="radio" name="aktif" value="HAYIR"> HAYIR
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Yemek Ekle" class="btn-secondary">
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
                
                if(isset($_POST['aktif']))
                {
                    $aktif = $_POST['aktif'];
                }
                else
                {
                    $aktif = "HAYIR";
                }

                if(isset($_FILES['image']['name']))
                {
                   
                    $image_name = $_FILES['image']['name'];

                    
                    if($image_name!="")
                    {
                        
                        $ext = end(explode('.', $image_name));

                        
                        $image_name = "Food-Name-".rand(0000,9999).".".$ext; 
                        $src = $_FILES['image']['tmp_name'];

                        
                        $dst = "../images/food/".$image_name;
                        $upload = move_uploaded_file($src, $dst);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Resim Eklenmedi.</div>";
                            header('location:'.SITEURL.'Yonetici_islemleri/yemek_ekle.php');
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }
                $sql2 = "INSERT INTO yemek_tbl SET 
                    yemek_adi = '$yemek_adi',
                    yemek_ozellekler = '$ozellikler',
                    birim_fiyat = $fiyat,
                    fot_adi = '$image_name',
                    urun_id = $kategori,
                    aktif = '$aktif'
                ";

                $res2 = mysqli_query($conn, $sql2);

                
                if($res2 == true)
                {
                   
                    $_SESSION['add'] = "<div class='success'>Yiyecek Basariyla Eklendi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
                }
                else
                {
                    
                    $_SESSION['add'] = "<div class='error'>Yiyecek Eklenemedi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
                }

                
            }

        ?>


    </div>
</div>

<?php include('alt_bilgi.php'); ?>