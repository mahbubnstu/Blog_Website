<?php include'inc/header.php';?>

	<?php
	if (!isset($_GET['search']) || $_GET['search'] == NULL) {
		header("location:404.php");
	}
	else{$search = $_GET['search'];}
	?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
		   <?php 
	
			$query = "select *from tbl_post where title like '%$search%' or body like'%$search%'";
			$post = $db->select($query);
			if($post){
			while($result = $post->fetch_assoc()){
			?>
				<h2><?php echo $result['title'] ;?></h2>
				<h4><?php echo $fm->formatdate($result['date']) ;?>,By <a href="#"><?php echo $result['author'] ;?></a></h4>
				<img src="admin/<?php echo $result['image'] ;?>" alt="post image"/>
				<?php echo $result['body'] ;?>
				
				


				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					$catid = $result['cat'];
					$queryrelated = "select *from tbl_post where cat='$catid' order by rand() limit 6";
					$postrelated = $db->select($queryrelated);
					if($postrelated){
					while($rresult = $postrelated->fetch_assoc()){
					?>
					<a href="post.php?id=<?php echo $rresult['id'] ;?>"><img src="admin/upload/<?php echo $rresult['image'] ;?>" alt="post image"/>
					</a>
					
					<?php } } else {echo "No Related Post is Available!!";}?>
				</div>
				<?php } } else {?>
					<p>your typed message is not found</p>
				<?php }?>
	</div>
	</div>
		
		<?php include'inc/sidebar.php';?>
		<?php include'inc/footer.php'; ?>