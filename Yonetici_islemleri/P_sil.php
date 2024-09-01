<?php 
    include('../baglanti/ve_ta_baglanti.php'); 
    $id = $_GET['id'];
    $sql = "DELETE FROM personel_tbl WHERE Id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Personel Basariyla Silindi.</div>";
        header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
    }
    else
    {        $_SESSION['delete'] = "<div class='error'>Personel Silinemedi./div>";
        header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
    }
?>