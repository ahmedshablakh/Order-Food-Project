<?php 
    include('../baglanti/ve_ta_baglanti.php'); 
    $id = $_GET['id'];
    $sql = "DELETE FROM admin_tbl WHERE Id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Yonetici Basariyla Silindi.</div>";
        header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
    }
    else
    {        $_SESSION['delete'] = "<div class='error'>Yonetici Silinemedi./div>";
        header('location:'.SITEURL.'Yonetici_islemleri/Sistem_yon.php');
    }
?>