<?php 

    include('../baglanti/ve_ta_baglanti.php'); 
    include('giris_kontrol.php');

?>


<html>
    <head>
        <title>Yonetici Paneli</title>
        <link rel="stylesheet" href="../css/admin.css">
		
		<script>
	function onay(){
	  
     return confirm(" Silmek Ister misim ?");
   }
  </script>  
    </head>
    
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Yonetici Paneli</a></li>
                    <li><a href="urun_yonet.php">Urunler </a></li>
                    <li><a href="yonet_yemek.php">Yemekler</a></li>
                    <li><a href="siparis.php">Siparisler</a></li>
                    <li><a href="Sistem_yon.php">Sistem Yoneti</a></li>
                    <li><a href="cikis.php">Cikis</a></li>
                </ul>
            </div>
        </div>