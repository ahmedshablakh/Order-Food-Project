<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Urun Guncelleme </h1>

        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM urunler_tbl WHERE Id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                
                {
                    $row = mysqli_fetch_assoc($res);
                    $urun_adi = $row['urun_adi'];
                    $gecerli_resim = $row['fot_adi'];
                    $aktif = $row['aktif'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Urun Bulunamadi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                }

            }
            else
            {
                header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Urun Adi </td>
                    <td>
                        <input type="text" name="urun_adi" value="<?php echo $urun_adi; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Resim</td>
                    <td>
                        <?php 
                            if($gecerli_resim != "")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $gecerli_resim; ?>" width="150px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Resim Eklenmedi.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Yeni Resim </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Aktif Durumu </td>
                    <td>
                        <input <?php if($aktif=="EVET"){echo "checked";} ?> type="radio" name="aktif" value="EVET"> EVET 

                        <input <?php if($aktif=="HAYIR"){echo "checked";} ?> type="radio" name="aktif" value="HAYIR">HAYIR
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="gecerli_resim" value="<?php echo $gecerli_resim ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Urun Guncell" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $urun_adi = $_POST['urun_adi'];
                $gecerli_resim = $_POST['gecerli_resim'];
                $aktif = $_POST['aktif'];
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; 
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Resim Yuklenemedi. </div>";
                            header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                            die();
                        }
                        if($gecerli_resim="")
                        {
                            $remove_path = "../images/category/".$gecerli_resim;

                            $remove = unlink($remove_path);
                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Mevcut Resim kaldirilamadi.</div>";
                                header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
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
                $sql2 = "UPDATE urunler_tbl SET 
                    urun_adi = '$urun_adi',
                    fot_adi = '$image_name',
                    aktif = '$aktif' 
                    WHERE Id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);
                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Urun Basariyla Guncellendi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Urun Guncellenemedi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                }

            }
        
        ?>

    </div>
</div>

<?php include('alt_bilgi.php'); ?>