<?php
  if(isset($_GET['delete'])){
      include("connect.php");
      $id=$_GET['delete'];
      $sql = ("DELETE FROM user WHERE ID='$id' ");
                $result=mysqli_query($conn, $sql) or die();
                if($result==true){
                    echo "<script>alert('Student Removed successfully');
    window.location.href='index.php';</script>";
                }
                else{
                  echo "<script>alert('Student Not Removed ');
  window.location.href='index.php';</script>";
                }

}
?>
