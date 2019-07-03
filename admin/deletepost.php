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
     if (!isset($_GET['delpostid']) || $_GET['delpostid']==NULL) {
            echo "<script>window.location='postlist.php';</script>";
            }else{
            $id = $_GET['delpostid'];
    
            $query = "select *from tbl_post where id='$id'";
            $dpost = $db->select($query);
            if($dpost){
            while ($result =$dpost->fetch_assoc()) {
                $dimage = $result['image'];
                unlink($dimage);
            }
        }
        $delquery = "delete from tbl_post where id='$id'";
        $deldata = $db->delete($delquery);
        if ($deldata) {
            echo "<script>alert('Data Deleted Successfully.');</script>";
            echo "<script>window.location='postlist.php';</script>";
        }else
        {
             echo "<script>alert('Data Not Deleted');</script>";
            echo "<script>window.location='postlist.php';</script>";
        }
    }

 ?>

   