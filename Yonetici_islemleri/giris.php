<?php include('../baglanti/ve_ta_baglanti.php'); ?>

<html>
    <head>
        <title> Yonetici Girisi </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Yonetici Girisi</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        

            
            <form action="" method="POST" class="text-center">
            Kullanici adi: <br>
            <input type="text" name="Kullanci_adi" placeholder="Kullanci adi"><br><br>

            Parola: <br>
            <input type="password" name="Parola" placeholder="Parola "><br><br>
            <input type="radio" name="yon" value="Yonetici"/> Yonetici
            <input type="radio" name="yon" value="Personel"/> Personel<br><br>

            <input type="submit" name="submit" value="Giris" class="btn-primary">
            <br><br>
            </form>
           

            
        </div>

    </body>
</html>

<?php 

    
    if(isset($_POST['submit']))
    {
        $Kullanci_adi = $_POST['Kullanci_adi'];
        $Parola = $_POST['Parola'];
        $meslek = $_POST['yon'];
        if($meslek !=""){  
            if($meslek=="Yonetici"){
        $sql = "SELECT * FROM admin_tbl WHERE kullanci_adi='$Kullanci_adi' AND sifre='$Parola'";


        $res = mysqli_query($conn, $sql);


        $count = mysqli_num_rows($res);

        if($count==1)
        {
            
            $_SESSION['login'] = "<div class='success'>Giris basarili.</div>";
            $_SESSION['user'] = $Kullanci_adi; 
            header('location:'.SITEURL.'Yonetici_islemleri/');
        }
        else
        {
            
            $_SESSION['login'] = "<div class='error text-center'>Kullanici adi veya Sifre Yanlis.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/giris.php');
        }
        }
        else if($meslek=="Personel"){
        $sql1 = "SELECT * FROM personel_tbl WHERE kullanci_adi='$Kullanci_adi' AND sifre='$Parola'";


        $res2 = mysqli_query($conn, $sql1);


        $count2 = mysqli_num_rows($res2);

        if($count2==1)
        {
            
            $_SESSION['login'] = "<div class='success'>Giris basarili.</div>";
            $_SESSION['user'] = $Kullanci_adi; 
            header('location:'.SITEURL.'Yonetici_islemleri/personel_panel.php');
        }
        else
        {
            
            $_SESSION['login'] = "<div class='error text-center'>Kullanici adi veya Sifre Yanlis.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/giris.php');
        }
        }
                        
        else
        {
            
            $_SESSION['login'] = "<div class='error text-center'>Kullanici adi veya Sifre Yanlis.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/giris.php');
        }


    }
    
    else {
        $_SESSION['login'] = "<div class='error text-center'>Kontrol Yabin.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/giris.php');
        
        
    }
    }
?>