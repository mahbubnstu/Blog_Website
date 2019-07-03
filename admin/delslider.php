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
     if (!isset($_GET['delid']) || $_GET['delid']==NULL) {
            echo "<script>window.location='sliderlist.php';</script>";
            }else{
            $id = $_GET['delid'];
    
            $query = "select *from tbl_slider where id='$id'";
            $getslider = $db->select($query);
            if($getslider){
            while ($result =$getslider->fetch_assoc()) {
                $dimage = $result['image'];
                unlink($dimage);
            }
        }
        $delquery = "delete from tbl_slider where id='$id'";
        $deldata = $db->delete($delquery);
        if ($deldata) {
            echo "<script>alert('Slider Deleted Successfully.');</script>";
            echo "<script>window.location='sliderlist.php';</script>";
        }else
        {
             echo "<script>alert('Slider Not Deleted');</script>";
            echo "<script>window.location='sliderlist.php';</script>";
        }
    }

 ?>

   