<?php include'inc/header.php';?>

               <?php
                if (!isset($_GET['pagid'])) {
                    header("Location:404.php");
                }else{
                    $id =$_GET['pagid'];
                }
                ?>

         <?php
                        $query ="select *from tbl_page where id='$id'";
                        $page = $db->select($query);
                        if ($pages) {
                        while ($result = $page->fetch_assoc()) { ?>        

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['name'];?></h2>
				<?php echo $result['body'];?>
				
	</div>

		</div>
		<?php } } else {header("Location:404.php");}?>
		
		<?php include'inc/sidebar.php';?>
		<?php include'inc/footer.php'; ?>