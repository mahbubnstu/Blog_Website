<?php include'inc/header.php';?>
<?php include'inc/slider.php';?>

			<?php
				if (!isset($_GET['category']) || $_GET['category'] == NULL) {
					header("location:404.php");
				}
				else{$category = $_GET['category'];}
			?>

			<div class="contentsection contemplete clear">
			<div class="maincontent clear">

			<?php 
	
			$query = "select *from tbl_post where cat=$category";
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


			<?php } } else {?>
				<span style="font-size: 20px;color:red;">No category is availble in this page</span>
			<?php }?>


	<?php include'inc/sidebar.php';?>
	</div>
	<?php include'inc/footer.php'; ?>