<?php include('menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Gida Urunleri Yonet</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?>
        <br><br>

                <a href="<?php echo SITEURL; ?>Yonetici_islemleri/urun_ekle.php" class="btn-primary">Urun Ekle</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th> # </th>
                        <th>Urun Adi</th>
                        <th>Resim</th>
                        <th>Aktif Durumu</th>
                        <th></th>
                    </tr>

                    <?php 

                        $sql = "SELECT * FROM urunler_tbl";
                         $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['Id'];
                                $yemek_adi = $row['urun_adi'];
                                $fot_adi = $row['fot_adi'];
                                $aktif = $row['aktif'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $yemek_adi; ?></td>

                                        <td>

                                            <?php  
                                                
                                                if($fot_adi!="")
                                                {
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $fot_adi; ?>" width="100px" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo "<div class='error'>Resim Eklenmedi.</div>";
                                                }
                                            ?>

                                        </td>

                                        <td><?php echo  $aktif ; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/urun_guncell.php?id=<?php echo $id; ?>" class="btn-secondary">Urun Guncelle</a>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/urun_sil.php?id=<?php echo $id; ?>" class="btn-danger" onclick="return onay()">Urun Sil </a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">Urun Eklenmedi.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

<?php include('alt_bilgi.php'); ?>