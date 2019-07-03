<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?> 

<?php
                if (!isset($_GET['msgid']) && $_GET['msgid'] == NULL) {
                   echo "<script>window.location='inbox.php';</script>"; 
                }else{
                    $msgid = $_GET['msgid'];
                }
                
                ?>
        <div class="grid_10">


		
            <div class="box round first grid">
                <h2>View message</h2>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  echo "<script>window.location='inbox.php';</script>"; 
                
                }
                
                ?>
                <div class="block">               
                 <form action="" method="post" >
                    <?php
                        $query ="select *from tbl_contact where id='$msgid'";
                        $message = $db->select($query);
                        if ($message) {
                        
                        while($result = $message->fetch_assoc()) {
                        ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>name</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $result['firstname'].' '.$result['lastname'];?>" class="medium" />
                            </td>
                        </tr>   

                         <tr>
                            <td>
                                <label>email</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr> 

                         <tr>
                            <td>
                                <label>date</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $fm->formatdate($result['date']);?>"  class="medium" />
                            </td>
                        </tr> 
                       
                        <tr>
                            <td>
                                <label>message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $result['body'];?> 
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="send" />
                                 
                            </td>
                        </tr>
                    </table>
                <?php } }?>
                    </form>
                </div>
            </div>
        </div>
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <!-- Load TinyMCE -->


<?php include'inc/footer.php';?>    




 