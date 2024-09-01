<?php 
    include('../baglanti/ve_ta_baglanti.php'); 
      if(isset($_GET['id'])) 
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM yemek_tbl WHERE Id=$id";
       
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Yiyecek Basariyla Silindi.</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Yiyecek Silinemedi..</div>";
            header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
        }
    }
    else
    {

        $_SESSION['unauthorize'] = "<div class='error'>Yetkisiz Erisim.</div>";
        header('location:'.SITEURL.'Yonetici_islemleri/yonet_yemek.php');
    }

?>