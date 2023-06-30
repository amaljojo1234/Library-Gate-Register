
      <?php
        include("connect.php");
        $rfid=$_GET['rfid'];
        $sql="SELECT * FROM user WHERE RFID=$rfid ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $id=$row['ID'];
        $sql="SELECT * FROM librarydata WHERE ID=$id order by Serialno DESC ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          $row = mysqli_fetch_assoc($result);
          if($row['Exit_time']==NULL){
            $ser=$row['Serialno'];
            $sql="update  librarydata set Exit_Time=now() where Serialno=$ser";
            $result=mysqli_query($conn,$sql);
            echo '<script>
                window.location.href="index.php";
                    </script>';
          }
          else{
            $sql="insert into librarydata(id,Enrty_Time) values($id,now())";
            $result=mysqli_query($conn,$sql);
            echo '<script>
                window.location.href="index.php";
                    </script>';

          }
        }
          else{
            $sql="insert into librarydata(id,Enrty_Time) values($id,now())";
            $result=mysqli_query($conn,$sql);
            echo '<script>
                window.location.href="index.php";
                    </script>';
          }
        }
        else{
          echo '<script>
  				  	window.alert("Your not registered user!");
              window.location.href="index.php";
  				        </script>';
        }
        ?>
