<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?> 
        <div class="grid_10">

<style>
    .actiondel{
        margin-top: 2px;
    }
    .actiondel a{

     background-color:#DDDDDD;
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 2px 10px
    }
</style>

            <?php
                if (!isset($_GET['pagid'])) {
                    echo "<script>window.location='index.php';</script>";
                }else{
                    $id =$_GET['pagid'];
                }
                ?>
		
            <div class="box round first grid">
                <h2>Edit Page</h2>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                 
                $name = mysqli_real_escape_string($db->link,$_POST['name']);
                $body = mysqli_real_escape_string($db->link,$_POST['body']);
               

              if ($name ==""|| $body =="") {
                 echo "<span class='error'>the field must not be empty!</span>";
                
               }
                 
               else{
                            
                        $query = "update tbl_page set
                        name ='$name',
                        body ='$body'
                        where id ='$id'
                        ";
                        $updated_row = $db->update($query);
                        if ($updated_row) {
                         echo "<span class='success'>Page updated Successfully.
                         </span>";
                        }
                        else {
                         echo "<span class='error'>Page Not Updated !</span>";
                        }
                        }
                }
                
                ?>
                <div class="block">   
                  <?php
                        $query ="select *from tbl_page where id='$id'";
                        $page = $db->select($query);
                        if ($pages) {
                        while ($result = $page->fetch_assoc()) { ?>

                 <form action="" method="post" >                 
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name ="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>   
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
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
                                <input type="submit" name="submit" Value="Update" />
                              <span class="actiondel"><a onclick='return confirm("Are yor sure to Delete!")'; href="delpage.php?delpage=<?php echo $result['id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                   <?php } }?>
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




 