<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Gida Ogelerini Yonet</h1>

        <br /><br />
                <a href="<?php echo SITEURL; ?>Yonetici_islemleri/yemek_ekle.php" class="btn-primary">Yiyecek Ekle</a>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="tbl-full">
                    <tr>
                        <th> # </th>
                        <th>Yemek Adi</th>
                        <th>Fiyat</th>
                        <th>Resim</th>
                        <th>Aktif Durum</th>
                        <th></th>
                    </tr>

                    <?php 
                        
                        $sql = "SELECT * FROM yemek_tbl";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sira=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                
                                $id = $row['Id'];
                                $yemek_adi = $row['yemek_adi'];
                                $fiyat = $row['birim_fiyat'];
                                $fot_adi = $row['fot_adi'];
                                $aktif = $row['aktif'];
                                ?>

                                <tr>
                                    <td><?php echo $sira++; ?>. </td>
                                    <td><?php echo $yemek_adi; ?></td>
                                    <td><?php echo $fiyat; ?> TL</td>
                                    <td>
                                        <?php  
                                            
                                            if($fot_adi=="")
                                            {
                                                
                                                echo "<div class='error'>Resim Eklenmedi.</div>";
                                            }
                                            else
                                            {
                                                
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $fot_adi; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $aktif; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>Yonetici_islemleri/yemek_guncell.php?id=<?php echo $id; ?>" class="btn-secondary">Yemek Guncell</a>

			
			 <a href="<?php echo SITEURL; ?>Yonetici_islemleri/yemek_sil.php?id=<?php echo $id; ?>" class="btn-secondary" onclick="return onay()">Yemek Sil</a>
			
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr> <td colspan='7' class='error'> Yiyecekler Henuz Eklenmedi.</td> </tr>";
                        }

                    ?>

                    
                </table>
				
    </div>
    
</div>

<?php include('alt_bilgi.php'); ?>