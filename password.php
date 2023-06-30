<?php session_start();?>
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
  .connect{
  padding-left:200px;
  padding-right:200px;

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

                       <li class="dropdown"><a class="dropdown-toggle wow fadeInDown" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th"></span> <?php echo $_SESSION['student'] ?> <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                             <li><a href="details.php">Details</a></li>
                             </ul>
                       </li>
                      <li><a href="logout.php">lOGOUT</a></li>
                  </ul>
              </div>
            </div>
</nav>

                                                      <!--edit operation-->
<br><br><br><br><br>
<br><br><br><br><br>
<center><div class="container wow fadeInDown">
    <div class="row">
        </div>
        <div class="col-md-6" style="border: solid #CFCFCF 2px; border-radius: 10px;">


<br>                <div>
        <h3 style="text-align:center; font-weight:bold;" class="wow fadeInDown">Change Password</h3>
        <hr>

        </div>
        <form class="form-horizontal" method="POST" action="" style="margin-top: 20px;">

                <div class="form-group">
                    <label for="npassword" class="col-sm-4 control-label wow fadeInDown">Password</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control wow fadeInDown" id="npassword" name="npassword" placeholder="Enter Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpassword" class="col-sm-4 control-label wow fadeInDown">Confirm Password</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control wow fadeInDown" id="cpassword" name="cpassword" placeholder="Enter Password" required>
                    </div>
                </div>

                <center><input type="submit" class="btn btn-success wow fadeInDown" name="update" value="Save Changes">

                <hr>
                </center></div>
              </form>
              </div>
        </div>

</div>


<br><br><br><br><br>
<br><br><br><br><br>

<footer id="footer" class="midnight-blue wow fadeInDown">
        <?php include('footer.php');?>
    </footer><!--/#footer-->
</body>
<?php include('connect.php');
  if(isset($_POST['update'])){
    $userd=$_SESSION['student'];
    $pass=$_POST['npassword'];
    $pass2=$_POST['cpassword'];
    if($pass!=$pass2){
      echo '<script>alert("Passwords Do Not Match");
                                       window.location.href="password.php"</script>';
    }
      $sql="UPDATE `user` SET `Password`='$pass' WHERE `Username`='$userd'";
      $result=mysqli_query($conn, $sql);
          echo '<script>alert("Successfully Updated");
                                        window.location.href="index.php"</script>';
  }
?>
</html>
