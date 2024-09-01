<?php   include('p_menu.php'); 
   

    
    ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Yemek Siparisini Yonet  </h1> <br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Yemek</th>
                        <th width="8%">Birim Fiyati</th>
                        <th width="5%">Adet</th>
                        <th width="10%">Toplam</th>
                        <th width="8%">Durum</th>
                        <th width="10%">Musteri Adi</th>
                        <th width="10%">Tel No</th>
                        <th width="7%"></th>
						<th width="5%"></th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM siparis_tbl ORDER BY Id DESC";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sira = 1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['Id'];
                                $yemek_adi = $row['yemek_adi'];
                                $birim_fiyat = $row['birim_fiyat'];
                                $adet = $row['adet'];
                                $toplam = $row['toplam'];
                                $siparis_tarihi = $row['siparis_tarihi'];
                                $durum = $row['durum'];
                                $musteri_adi= $row['musteri_adi'];
                                $musteri_tel = $row['musteri_tel'];
                                $musteri_adres = $row['musteri_adres'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo "<b>".$sira++."</b>"; ?> </td>
                                        <td><?php echo $yemek_adi; ?></td>
                                        <td><?php echo $birim_fiyat.'<b> TL</b>'; ?></td>
                                        <td><?php echo $adet; ?></td>
                                        <td><?php echo $toplam.'<b> TL</b>'; ?></td>
                                        

                                        <td>
                                            <?php 
                                                if($durum=="Daha Teslim Edilmedi")
                                                {
                                                    echo "<label style='color: blue;'>$durum</label>";
                                                }
                                                elseif($durum=="Teslimat Siparislerinde")
                                                {
                                                    echo "<label style='color: orange;'>$durum</label>";
                                                }
                                                elseif($durum=="Teslim Ediledi")
                                                {
                                                    echo "<label style='color: green;'><b>$durum</b></label>";
                                                }
                                                elseif($durum=="Iptal Edilen Siparisler")
                                                {
                                                    echo "<label style='color: red;'>$durum</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $musteri_adi; ?></td>
                                         <td><?php echo $musteri_tel; ?></td>
                                        
                                        <td>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/personel_goster.php?id=<?php echo $id; ?>" class="btn-secondary">DETAY</a>
                                        </td>
										<td> <a href="<?php echo SITEURL; ?>Yonetici_islemleri/siparis_yazdir.php?id=<?php echo $id; ?>" class="btn-secondary" style=" background-color:#00CCCC">YAZDIR</a>
 </td>
</tr>
<?php

                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>Siparisler Bullanmadi.</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

                                        


<?php include('alt_bilgi.php'); ?>