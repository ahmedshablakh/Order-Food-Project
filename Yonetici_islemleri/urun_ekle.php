<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Urun Ekle</h1>

        <br><br>

        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Urun Adi  </td>
                    <td>
                        <input type="text" name="urun_adi">
                    </td>
                </tr>

                <tr>
                    <td>Resim Sec </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>                <tr>
                    <td>Aktif  </td>
                    <td>
                        <input type="radio" name="aktif" value="EVET"> EVET 
                        <input type="radio" name="aktif" value="HAYIR"> HATIR 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="URUN EKLE" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $urun_adi = $_POST['urun_adi'];
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
                    if($image_name != "")
                    {
                        $ext = end(explode('.', $image_name));
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext;
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Resim Yuklenemedi.</div>";
                            header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                            die();
                        }

                    }
                }
                else
                {
                    $image_name="";
                }
                $sql = "INSERT INTO urunler_tbl SET 
                    urun_adi='$urun_adi',
                    fot_adi='$image_name',
                    aktif='$aktif'
                ";
                $res = mysqli_query($conn, $sql);
                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'>Kategori Basariyla Eklendi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Kategori Eklenemedi.</div>";
                    header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
                }
            }
        
        ?>

    </div>
</div>

<?php include('alt_bilgi.php'); ?>