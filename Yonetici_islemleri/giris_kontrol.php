<?php 

   
    if(!isset($_SESSION['user'])) 
    {
        
        $_SESSION['no-login-message'] = "<div class='error text-center'>Yonetici Paneline erismek icin lutfen giris yapin.</div>";
        
        header('location:'.SITEURL.'Yonetici_islemleri/giris.php');
    }

?>