<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Yonetici Ekle</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Adi Soyadi</td>
                    <td>
                        <input type="text" name="adi_soyadi">
                    </td>
                </tr>

                <tr>
                    <td>Kullanci Adi </td>
                    <td>
                        <input type="text" name="kullanci_adi" >
                    </td>
                </tr>

                <tr>
                    <td>Parol </td>
                    <td>
                        <input type="password" name="parol" >
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Yonetici Ekle" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('alt_bilgi.php'); ?>


<?php 
    if(isset($_POST['submit']))
    {
        $adi_soyadi = $_POST['adi_soyadi'];
        $kullanci_adi= $_POST['kullanci_adi'];
        $parol =  $_POST['parol'];
        $sql = "INSERT INTO admin_tbl SET 
            adi_soyadi='$adi_soyadi',
            kullanci_adi='$kullanci_adi',
            sifre='$parol'
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Yonetici Basariyla Eklendi.</div>";
            header("location:".SITEURL.'Yonetici_islemleri/Sistem_yon.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Yonetici Eklenemedi.</div>";
            header("location:".SITEURL.'Yonetici_islemleri/Sistem_yon.php');
        }

    }
    
?>