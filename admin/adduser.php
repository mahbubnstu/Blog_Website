
<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?> 
<?php 
if(!(Session::get('userRole') =='1')){
     echo "<script>window.location='index.php';</script>";
   }
?> 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $fm->validation($_POST['username']);
            $password = $fm->validation(md5($_POST['password']));
            $role     = $fm->validation($_POST['role']);
            $email    = $fm->validation($_POST['email']);

            

            $username = mysqli_real_escape_string($db->link,$_POST['username']);
            $password = mysqli_real_escape_string($db->link,$_POST['password']);
            $role     = mysqli_real_escape_string($db->link,$_POST['role']);
            $email     = mysqli_real_escape_string($db->link,$_POST['email']);
            if(empty($username) || empty($password) || empty($role) || empty($email)){
                echo "<span class='error'>the field must not be empty!</span>";
            }else{
            $mailquery ="select *from tbl_user where email='$email' limit 1";
            $checkmail=$db->select($mailquery);
            if ($checkmail) {
                echo "<span class='error'>Email already exist!</span>";
            }

            else{
                $query = "insert into tbl_user(username,password,email,role) values ('$username','$password','$email',$role')";
                $catinsert =$db->insert($query);
                if ($catinsert) {
                     echo "<span class='success'>User created successfully.</span>";
                }else{
                    echo "<span class='error'>User not created!</span>";
                }
            }

        }
    }
            ?>
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="username"placeholder="Enter Username" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="text" name="password"placeholder="Enter Password" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>
                                <input type="text" name="email"placeholder="Enter Valid mail address" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>
                                <select id="select" name="role">
                                   <option>Select User Role</option> 
                                   <option value="1">Admin</option> 
                                   <option value="2">Author</option> 
                                   <option value="3">Editor</option> 
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        
<?php include'inc/footer.php';?>