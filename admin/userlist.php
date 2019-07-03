<?php include'inc/header.php';?>
 <?php include'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <?php
                if (isset($_GET['deluser'])) {
                	$deluser=$_GET['deluser'];
                	$query ="delete from tbl_cat where id ='$deluser'";
                	$result=$db->delete($query);
                if ($result) {
                	echo "<span class='success'>User deleted successfully.</span>";
                }else{echo "<span class='error'>User Not deleted!!</span>";}
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No</th>
							<th>name</th>
							<th>username</th>
							<th>email</th>
							<th>details</th>
							<th>role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query ="select *from tbl_user order by id desc";
						$user = $db->select($query);
						if ($user) {
							$i = 0;
						while($result = $user->fetch_assoc()) {
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['username'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['details'];?></td>
							<td>
								<?php if($result['role'] == '1'){
								echo "Admin";
							   }elseif ($result['role'] == '2') {
							   	echo "Author";
							   }elseif ($result['role'] == '3') {
							   	echo "Editor";
							   }

							?>
							</td>
							<td><a   href="viewuser.php?userid=<?php echo $result['id'];?>">View</a> 
							<?php	if(Session::get('userRole')=='1'){?>
							|| <a
							onclick='return confirm("Are yor sure to Delete!")'; href="?deluser=<?php echo $result['id'];?>">Delete</a>
							<?php }?>
						</td>

						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>

        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();
        });
        </script>


<?php include'inc/footer.php';?>


    