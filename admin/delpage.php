<?php
    require_once '../lib/session.php';
    Session::checksession();
?>
        <?php include'../config/config.php';?>
        <?php include'../lib/Database.php';?>
        <?php include'../helpers/format.php';?>
        <?php 
           $db = new Database();
?>

<?php
     if (!isset($_GET['delpage']) || $_GET['delpage']==NULL) {
            echo "<script>window.location='index.php';</script>";
            }else{
            $delpage = $_GET['delpage'];
            
        $delquery = "delete from tbl_page where id='$delpage'";
        $deldata = $db->delete($delquery);
        if ($deldata) {
            echo "<script>alert('Page Deleted Successfully.');</script>";
            echo "<script>window.location='index.php';</script>";
        }else
        {
             echo "<script>alert('Page Not Deleted');</script>";
            echo "<script>window.location='index.php';</script>";
        }
    }

 ?>

   