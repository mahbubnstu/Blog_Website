<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>  

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Themes</h2>
               <div class="block copyblock"> 
                <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $theme = $_POST['theme'];
            $theme = mysqli_real_escape_string($db->link,$theme);
            
                $query = "update tbl_theme set 
                theme='$theme' 
                where id='1'";
                $updated_row =$db->update($query);
                if ($updated_row) {
                     echo "<span class='success'>Theme updated successfully.</span>";
                }else{
                    echo "<span class='error'>Theme not updated!</span>";
                }
            }

            ?>
            <?php 
            $query ="select *from tbl_theme where id='1'";
            $themes =$db->select($query);
            while($result=$themes->fetch_assoc()){
            ?>
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if ($result['theme']=='default') {echo "checked";} ?> type="radio" name="theme" value="default">Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme']=='green') {echo "checked";} ?> type="radio" name="theme" value="green">Green
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme']=='red') {echo "checked";} ?> type="radio" name="theme" value="red">Red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="change" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }?>
                </div>
            </div>
        </div>
        
<?php include'inc/footer.php';?>