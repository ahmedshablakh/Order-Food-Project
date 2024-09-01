<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Eski Parol </td>
                    <td>
                        <input type="password" name="eski">
                    </td>
                </tr>

                <tr>
                    <td>Yeni Parol</td>
                    <td>
                        <input type="password" name="yeni" >
                    </td>
                </tr>

                <tr>
                    <td>Tekrar Parol </td>
                    <td>
                        <input type="password" name="tekrar">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Sifirla" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 

            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $eski = $_POST['eski'];
                $yeni = $_POST['yeni'];
                $tekrar =$_POST['tekrar'];
                $sql = "SELECT * FROM personel_tbl WHERE Id=$id AND sifre='$eski'";
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        if($yeni ==$tekrar)
                        {
                            $sql2 = "UPDATE  personel_tbl SET 
                                sifre='$yeni' 
                                WHERE Id=$id
                            ";
                            $res2 = mysqli_query($conn, $sql2);
                            if($res2==true)
                            {
                                $_SESSION['change-pwd'] = "<div class='success'>Parola basariyla degistirildi.</div>";
                                header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
                            }
                            else
                            {
                                $_SESSION['change-pwd'] = "<div class='error'>Parol Degistirilemedi. </div>";
                                //Redirect the User
                                header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
                            }
                        }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "<div class='error'>Parol Yanlis </div>";
                            header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');

                        }
                    }
                    else
                    {
                        $_SESSION['user-not-found'] = "<div class='error'>Parol Yanlis. </div>";
                        header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
                    }
                }

            }

?>


<?php include('alt_bilgi.php'); ?>