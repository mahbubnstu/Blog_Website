<?php include'inc/header.php';?>
 <?php include'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                if (isset($_GET['delcat'])) {
                	$delid=$_GET['delcat'];
                	$query ="delete from tbl_cat where id ='$delid'";
                	$result=$db->delete($query);
                if ($result) {
                	echo "<span class='success'>Category deleted successfully.</span>";
                }else{echo "<span class='error'>Category Not delete successfully.</span>";}
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query ="select *from tbl_cat order by id desc";
						$cat = $db->select($query);
						if ($cat) {
							$i = 0;
						while($result = $cat->fetch_assoc()) {
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a onclick='return confirm("Are yor sure to Edit!")';  href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a
							onclick='return confirm("Are yor sure to Delete!")'; href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
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


    