<?php include('menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Sistem Yoneti</h1>

                <br />

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
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                ?>
                <br><br><br>
                <a href="yonetici_ekle.php" class="btn-primary">Yonetici Ekle</a>
                <a href="personel_ekle.php" class="btn-primary">Personel Ekle</a>

                <br /><br /><br />
                <h2> Sistem Yoneticisi </h2>

                <table class="tbl-full">
                    <tr>
                        <th>#</th>
                        <th>Adi Soyadi</th>
                        <th>Kullanci Adi</th>
                        <th> </th>
                    </tr>

                    
                    <?php 
                        $sql = "SELECT * FROM admin_tbl";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $sira=1;
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['Id'];
                                    $adi=$rows['adi_soyadi'];
                                    $kullanci=$rows['kullanci_adi'];

                                    ?>
                                    
                                    <tr>
                                        <td><?php echo   $sira++; ?>. </td>
                                        <td><?php echo $adi; ?></td>
                                        <td><?php echo $kullanci; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/Y_P_S.php?id=<?php echo $id; ?>" class="btn-primary">Parola sifirlama</a>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/Y_guncell.php?id=<?php echo $id; ?>" class="btn-secondary">Guncell</a>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/Y_sil.php?id=<?php echo $id; ?>" class="btn-danger" onclick="return onay()">Sil</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }
                            else
                            {
                            
                            }
                        }

                    ?>


                    
                </table>
                
                <br /><br /><br />
                <h2> Personeller </h2>

                <table class="tbl-full">
                    <tr>
                        <th>#</th>
                        <th>Adi Soyadi</th>
                        <th>Kullanci Adi</th>
                        <th> </th>
                    </tr>

                    
                    <?php 
                        $sql = "SELECT * FROM personel_tbl";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $sira=1;
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['Id'];
                                    $adi=$rows['adi_soyadi'];
                                    $kullanci=$rows['kullanci_adi'];

                                    ?>
                                    
                                    <tr>
                                        <td><?php echo   $sira++; ?>. </td>
                                        <td><?php echo $adi; ?></td>
                                        <td><?php echo $kullanci; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/P_P_S.php?id=<?php echo $id; ?>" class="btn-primary">Parola sifirlama</a>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/P_guncell.php?id=<?php echo $id; ?>" class="btn-secondary">Guncell</a>
                                            <a href="<?php echo SITEURL; ?>Yonetici_islemleri/P_sil.php?id=<?php echo $id; ?>" class="btn-danger" onclick="return onay()">Sil</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }
                            else
                            {
                            
                            }
                        }

                    ?>


                    
                </table>

            </div>
        </div>


<?php include('alt_bilgi.php'); ?>