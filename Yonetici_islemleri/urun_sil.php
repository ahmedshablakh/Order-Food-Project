<?php 
    include('../baglanti/ve_ta_baglanti.php'); 
      if(isset($_GET['id'])) 
    {
        $id = $_GET['id']; 
        $sql = "DELETE FROM urunler_tbl WHERE Id=$id";
       
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Urun Basariyla Silindi.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Urun Silinemedi..</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
        }
    }
    else
    {

        $_SESSION['unauthorize'] = "<div class='error'>Yetkisiz Erisim.</div>";
        header('location:'.SITEURL.'Yonetici_islemleri/urun_yonet.php');
    }

?>