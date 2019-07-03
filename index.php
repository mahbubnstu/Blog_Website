
<?php include'inc/header.php';?>
<?php include'inc/slider.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

				<!--pagination-->
		<?php
		$per_page = 4;
		if(isset($_GET['page'])){
		$page = $_GET['page'];
		}
		else{
		$page = 1;
		}
		$start_from = ($page -1)*$per_page;
	?>
	<!--pagination-->


<?php 
	
			$query = "select *from tbl_post limit $start_from,$per_page ";
			$post = $db->select($query);
			if($post){
			while($result = $post->fetch_assoc()){
			
?>
	



			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'] ;?>"><?php echo $result['title'] ;?></a></h2>
				<h4><?php echo $fm->formatdate($result['date']) ;?>,By <a href="#"><?php echo $result['author'] ;?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'] ;?>" alt="post image"/></a>
				<?php echo $fm->textshorten($result['body']) ;?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?> ">Read More</a>
				</div>
			</div>


			<?php } ?> <!--end while loop-->


			<!--pagination--> 
			

			<?php 
			$query = "select *from tbl_post ";
			$result = $db->select($query);
			$total_rows = mysqli_num_rows($result);
			$total_page = ceil($total_rows/$per_page);

			echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
				for($i = 1; $i<=$total_page;$i++){
				echo "<a href='index.php?page=".$i."'>".$i."</a>";
			};
				 echo "<a href='index.php?page=total_page'>".'Last Page'."</a></span>"?>

			<!--pagination-->

			<?php } else {header("location:404.php");}?>
	
		</div>
		<?php include'inc/sidebar.php';?>

	</div>

	<?php include'inc/footer.php'; ?>

	