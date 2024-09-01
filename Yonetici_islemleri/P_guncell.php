<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Bilgi Guncell</h1>

        <br><br>

        <?php 
            $id=$_GET['id'];
            $sql="SELECT * FROM personel_tbl WHERE Id=$id";
            $res=mysqli_query($conn, $sql);
            if($res==true)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $adi_soyadi = $row['adi_soyadi'];
                    $kullanci_adi = $row['kullanci_adi'];
                }
                else
                {
                    header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Adi Soyadi </td>
                    <td>
                        <input type="text" name="adi_soyadi" value="<?php echo $adi_soyadi; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Kullanci Adi </td>
                    <td>
                        <input type="text" name="kullanci_adi" value="<?php echo $kullanci_adi; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Guncell" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $adi_soyadi = $_POST['adi_soyadi'];
        $kullanci_adi = $_POST['kullanci_adi'];
        $sql = "UPDATE personel_tbl SET
        adi_soyadi = '$adi_soyadi',
        kullanci_adi = '$kullanci_adi' 
        WHERE Id='$id'
        ";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'>Guncellendi.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Hatta ! ...</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
        }
    }

?>


<?php include('alt_bilgi.php'); ?>