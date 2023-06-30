
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jssss.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main3.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="lightslider.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="lightslider.js"></script>

  <link rel="stylesheet" type="text/css" href="text9.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="img3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  #here{
    opacity: 0;
    filter: alpha(opacity=0);
  }
  #subHere{
    opacity: 0;
    filter: alpha(opacity=0);
  }
  </style>
  </head><!--/head-->

  <!--*********************************************START OF NAVIGATION BAR****************************************-->
  <body>
    <nav class="navbar navbar-inverse" role="banner">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                   <a href="index.php"><h2 class="wow fadeInDown" style="margin-top:20px;padding-left:0px; color:#FFF;">
                <center>Library Gate Way</center></h2><h2 class="wow fadeInDown" style="margin-top:-10px;padding-left:0px; color:#FFF;">

              </h2></a>
              </div>



              <div class="collapse navbar-collapse navbar-right wow fadeInDown">
                  <ul class="nav navbar-nav">
                       <li class="active"><a href="index.php"><i class="fa fa-home"></i>HOME</a></li>

                       <li class="dropdown"><a class="dropdown-toggle wow fadeInDown" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th"></span> <?php echo $_SESSION['student']; ?> <span class="caret"></span></a>

                         <ul class="dropdown-menu">
                           <li><a href="details.php">Details</a></li>
                           <li><a href="password.php">Change Password</a></li>


                           </ul>
                       </li>



                      <li><a href="logout.php">lOGOUT</a></li>
                  </ul>
              </div>
            </div>
</nav><div class="container">
<br><br><br><br><center><p style="color:red;font-size:30px;"><b>YOUR LOGIN DETAILS</b></p></center>
<br><br>
            <table border="1" id="userTable" >
              <tr>
                        <td style="text-align:center">ID</td>
                        <td style="text-align:center">NAME</td>
                        <td style="text-align:center">BATCH</td>
                        <td style="text-align:center">COURSE</td>
                        <td style="text-align:center">Department</td>
                        <td style="text-align:center">Phone Number</td>
                        <td style="text-align:center">Email</td>

                        <td>Entry Time</td>
                        <td>Exit Time</td>


              </tr>
              <?php
              include('connect.php');
              $userd=$_SESSION['student'];

              $sql = "select * from user where Username='$userd'";
              $re = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($re);
                $id=$row['ID'];


                  $sql = "select * from librarydata where ID=$id";
                  $re = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_array($re)){
                      $ID = $row['ID'];
                      $Entry_Time=$row['Enrty_Time'];
                      $Exit_time=$row['Exit_time'];
                      $sql = "select * from user where ID=$ID";
                      $res = mysqli_query($conn,$sql);
                      while($r= mysqli_fetch_array($res)){



                    echo "<tr>
                    <td>".$ID."</td>
                    <td>".$r['Name']."</td>
                    <td>".$r['Batch']."</td>
                    <td>".$r['Course']."</td>
                    <td>".$r['Department']."</td>
                    <td>".$r['Phone_Number']."</td>
                    <td>".$r['Email']."</td>

                    <td>".$Entry_Time."</td>
                    <td>".$Exit_time."</td>

                    </tr>";

                }}
               ?>
            </table>
            <br><br><br><br><br><br>
</div>
<footer id="footer" class="midnight-blue wow fadeInDown">
        <?php include('footer.php');?>
    </footer><!--/#footer-->
</body>

</html>
