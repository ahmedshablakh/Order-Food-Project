<?php 

    include('../baglanti/ve_ta_baglanti.php');
    

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
</head>

<body >
<h2 align="center" style="background-color:#3399FF">Order-Food</h2>
 <h4 align="center" bgcolor="#CCCCCC">Order-Food</h4> 


  <table  width="50%" border="1" align='center' class="tbl-full">
 <tr align='center'>
 <td bgcolor="#CCCCCC" > <div align="center" > # </div></td>
    <td bgcolor="#CCCCCC" > <div align="center" >MUSTERI ADI </div></td>
	<td bgcolor="#CCCCCC" > <div align="center" >TEL NO </div></td>
    <td bgcolor="#CCCCCC" > <div align="center" >YEMEK</div></td>
    <td bgcolor="#CCCCCC" > <div align="center" >BIRIM FİYATI </div></td>
    <td bgcolor="#CCCCCC" > <div align="center" >ADET</div></td>
	<td bgcolor="#CCCCCC" > <div align="center" >TOPLAM </div></td>
	<td bgcolor="#CCCCCC" > <div align="center" > SATIS TARIHI </div></td>
	<td bgcolor="#CCCCCC" > <div align="center" > SATIS TOPLAMI </div></td>
   </tr>
   
    <?php 
                 $sira =1;
                $sql = "SELECT * FROM siparis_tbl WHERE durum='Teslim Ediledi'";
                $res = mysqli_query($conn, $sql);
				$sql2 = "SELECT SUM(toplam) AS toplam FROM siparis_tbl WHERE durum='Teslim Ediledi'";
				$res2 = mysqli_query($conn, $sql2);
                $row1=mysqli_fetch_assoc($res2);
                $toplam1 = $row1['toplam'];
                 while($row=mysqli_fetch_assoc($res)){
                    $siparis_tarihi = $row['siparis_tarihi'];
                    $yemek_adi = $row['yemek_adi'];
                    $fiyat = $row['birim_fiyat'];
                    $adet = $row['adet'];
                    $toplam = $row['toplam'];
                    $durum = $row['durum'];
                    $musteri_adi = $row['musteri_adi'];
                    $musteri_tel = $row['musteri_tel'];
					echo"<tr align='center'>
    <td> <div align='center' >".$sira++."</div></td>                
    <td> <div align='center' > $musteri_adi</div></td>
	<td> <div align='center' >$musteri_tel</div></td>
    <td> <div align='center' > $yemek_adi </div></td>
    <td> <div align='center' > $fiyat </div></td>
	<td> <div align='center' > $adet </div></td>
	<td> <div align='center' > $toplam</div></td>
	<td> <div align='center' > $siparis_tarihi</div></td>
    <td bgcolor='#ff9485'></td>";
					
		}			
		
            
  
        ?>
  </tr> 
  <tr align='center'>
  <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td><td></td> 
	<td bgcolor='#ff9485'> <?php echo $toplam1 ;?> </td>  
	</tr>
   </table>
</body>
</html>
