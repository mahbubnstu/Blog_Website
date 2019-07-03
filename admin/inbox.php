<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?> 
        <div class="grid_10">


            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
                if (isset($_GET['seenid'])) {
                    $seenid = $_GET['seenid'];
                    $query = "update tbl_contact set
                        status ='1'
                        where id ='$seenid'
                        ";
                        $updated_row = $db->update($query);
                        if ($updated_row) {
                         echo "<span style='color:green'>Move successfully.
                         </span>";
                        }
                        else {
                        echo "<span style='color:red'>Something wrong.
                         </span>";
                        }
                }
                
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>name</th>
							<th>email</th>
							<th>message</th>
							<th>date</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$query ="select *from tbl_contact where status='0' order by id desc";
						$message = $db->select($query);
						if ($message) {
							$i = 0;
						while($result = $message->fetch_assoc()) {
							$i++;
						?>
						<tr class="odd gradeX">

							<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							 <td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['body']);?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							
						</tr>
							
							<td>
								<a href="msgview.php?msgid=<?php echo $result['id'];?>">View</a> ||
								<a href="repmsg.php?msgid=<?php echo $result['id'];?>">Reply</a>  ||
								<a onclick='return confirm("Are yor sure to move!")'; href="?seenid=<?php echo $result['id'];?>">Seen</a> 

							</td>
							
						</tr>
						<?php } }?>
						
					</tbody>
				</table>
               </div>
            </div>


            <div class="box round first grid">
                <h2>Message seen</h2>
                 <?php
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$query ="delete from tbl_contact where id ='$delid'";
                	$result=$db->delete($query);
                if ($result) {
                	echo "<span style='color:green'>Message deleted successfully.</span>";
                }else{echo "<span style='color:red'>Message Not deleted</span>";}
                }?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>name</th>
							<th>email</th>
							<th>message</th>
							<th>date</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$query ="select *from tbl_contact where status='1' order by id desc";
						$message = $db->select($query);
						if ($message) {
							$i = 0;
						while($result = $message->fetch_assoc()) {
							$i++;
						?>
						<tr class="odd gradeX">

							<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							 <td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['body']);?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							
						</tr>
							
							<td>
								<a href="msgview.php?msgid=<?php echo $result['id'];?>">View</a> ||
								<a onclick='return confirm("Are yor sure to Delete!")'; href="?delid=<?php echo $result['id'];?>">Delete</a> 

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