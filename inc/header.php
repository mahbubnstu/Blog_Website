<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'helpers/format.php';?>
<?php 
   $db = new Database();
   $fm = new format();
?>

<!DOCTYPE html>
<html>
<head>
	 <?php include'scripts/meta.php';?>        
	<?php include'scripts/css.php';?>
	<?php include'scripts/js.php';?>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			 <?php
            $query ="select *from title_slogan where id='1'";
            $tsl = $db->select($query);
            if ($tsl) {
             while ($result = $tsl->fetch_assoc()) { ?>
			<div class="logo">
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
			</div>
		<?php } }?>
		</a>
		<div class="social clear">
			<div class="icon clear">
				 <?php
                    $query ="select *from tbl_social where id='1'";
                    $social = $db->select($query);
                    if ($social) {
                    while ($result = $social->fetch_assoc()) { ?>
				<a href="<?php echo $result['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } }?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php 
	$path = $_SERVER['SCRIPT_FILENAME'];
			$currentpage = basename($path,'.php');
	?>
	<ul>
		<li><a 
			<?php 
			if($currentpage =='index'){echo "id='active'"; }
			 ?>
				
					 href="index.php">Home</a></li>
		<?php
        $query ="select *from tbl_page";
        $pages = $db->select($query);
        if ($pages) {
        while ($result = $pages->fetch_assoc()) { ?>
       <li><a 
       	 <?php 
       	 if (isset($_GET['pagid']) && $_GET['pagid'] == $result['id']) {
       	 	echo "id='active'";
       	 }
       	 ?>
       	href="about.php?pagid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a> </li>
       <?php  } }?>
		<li><a 
			<?php 
			if($currentpage =='contact'){echo "id='active'"; }
			 ?>
		 href="contact.php">Contact</a></li>
	</ul>
</div>
