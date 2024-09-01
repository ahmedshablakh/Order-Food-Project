<?php 

    include('../baglanti/ve_ta_baglanti.php');
    

?>

        <?php
                $id=$_GET['id'];
                $sql = "SELECT * FROM siparis_tbl WHERE Id=$id";
                $res = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($res);
                    $row=mysqli_fetch_assoc($res);
                    $siparis_tarihi = $row['siparis_tarihi'];
                    $yemek_adi = $row['yemek_adi'];
                    $fiyat = $row['birim_fiyat'];
                    $adet = $row['adet'];
                    $toplam = $row['toplam'];
                    $durum = $row['durum'];
                    $musteri_adi = $row['musteri_adi'];
                    $musteri_tel = $row['musteri_tel'];
                    $musteri_email = $row['musteri_email'];
                    $musteri_adres= $row['musteri_adres'];
                    $ozellik = $row['notu'];
                
            
                    
        ?>

<?php
// Aşağıdaki satırları eklerseniz word yada excel çıktısı alabilirsiniz. 
// Sayfada yazdıracağınız herşey ekrana değil RAPOR dosyasına (doc yada xls) yazılacaktır.

//word oluşturma
/*
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=RAPOR.doc"); 
header('Content-Type: application/x-msword; charset=UTF-8; format=attachment;');
*/
//excel oluşturma
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=RAPOR.xls"); 
header('Content-Type: application/x-msexcel; charset=UTF-8; format=attachment;');
?>
<html>
<head>
<meta charset="utf-8"/>
<title>RAPOR</title>
</head>

<body >


 
</div>


  <table  width="25%" border="0" align='center' class="tbl-full">
	<tr align='center'>
	<td    bgcolor="#CCCCCC" colspan="2">  <h4 align="center" bgcolor="#CCCCCC">Afiyet Olsun</h4>  </td>
    </tr><tr></tr>
    <tr align='center'>
	<td bgcolor="#CCCCCC" > <div align="center" ><b>MUSTIRI ADRES</b> </div></td> 
	<td> <div align="center" ><?php echo $musteri_adres; ?> </div></td>
       
	</tr>
    <tr></tr>    
  
  <tr align='center'>
<td bgcolor="#CCCCCC" > <div align="center" ><b>MUSTERI ADI</b> </div></td>
	<td> <div align="center" ><?php echo $musteri_adi; ?> </div></td>
	
    </tr><tr></tr>
	   <tr align='center'>
    <td bgcolor="#CCCCCC" > <div align="center" ><b>MUSTIRI TEL NO </b></div></td>	
	<td> <div align="center" ><?php echo $musteri_tel; ?> </div></td>

	</tr><tr></tr>
 <tr align='center'>
    <td bgcolor="#CCCCCC" > <div align="center" ><b>YEMEK</b></div></td>   
	<td> <div align="center" ><?php echo $yemek_adi; ?></div></td>
 
	</tr> <tr></tr>
    <tr align='center' >
     <td bgcolor="#CCCCCC" align='center' > <b>YEMEK OZELLIGI</b> </td>     
	<td > <div align="center" ><?php echo $ozellik; ?></div></td>
  
	</tr><tr></tr>
	<tr align='center'>
      <td bgcolor="#CCCCCC" > <div align="center" ><b>BİRİM FİYATİ </b></div></td> 
	<td> <div align="center" ><?php echo $fiyat; ?></div></td>
 
	</tr><tr></tr>
	<tr align='center'>
     <td bgcolor="#CCCCCC" > <div align="center" ><b>ADET</b></div></td>   
	<td> <div align="center" ><?php echo $adet; ?> </div></td>

	</tr><tr></tr>
	<tr align='center'>
    <td bgcolor="#CCCCCC" > <div align="center" ><b>TOPLAM</b> </div></td>	
	<td> <div align="center" ><?php echo $toplam; ?> </div></td>

    </tr><tr></tr>
	 
        <td bgcolor="#CCCCCC" > <div align="center" ><b>TARIH</b> </div></td> 	
	    <td  align="center"> <?PHP  date_default_timezone_set('Europe/Istanbul'); echo date('j/n/Y - G:i:s'); ?></td>

  </tr><tr></tr>
 </table>
</body>
</html>
