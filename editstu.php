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

                       <li class="dropdown"><a class="dropdown-toggle wow fadeInDown" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th"></span> <?php echo $_SESSION['admin']; ?> <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                             <li><a href="useradd.php">ADD USERS</a></li>
                             <li><a href="viewuser.php">VIEW USERS</a></li>
                             <li><a href="edit.php">EDIT USERS</a></li>
                             <li><a href="student1.php">LOG FILE</a></li>
                             </ul>
                       </li>
                      <li><a href="logout.php">lOGOUT</a></li>
                  </ul>
              </div>
            </div>
</nav>

                                                      <!--edit operation-->

<br><br><br><br><br>
<div class="container wow fadeInDown">
    <div class="row">
        </div>
        <div class="col-md-6" style="border: solid #CFCFCF 2px; border-radius: 10px;">

            <?php

                  include("connect.php");
                $id = $_GET['edit'];
                $sql = ("SELECT * FROM user WHERE ID='$id'");
                $i = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($i))
                {
                        $name = $row['Name'];
                        $batch = $row['Batch'];
                        $course = $row['Course'];
                        $dept = $row['Department'];
                        $email = $row['Email'];
						            $phone = $row['Phone_Number'];

                    }
                ?>
<br>                <div>
        <h3 style="text-align:center; font-weight:bold;" class="wow fadeInDown">Account Information</h3>
        <hr>

        </div>
             <form class="form-horizontal" name="adminacc" id="adminacc" method="POST" action="" style="margin-top: 20px;">
                <table>

                </table>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label wow fadeInDown">Name</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control wow fadeInDown" id="name" name="proprietor_name" placeholder="<?php echo $name?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label wow fadeInDown">Phone</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control wow fadeInDown" id="Phone" name="phone" placeholder="<?php echo $phone?>"required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="email" class="col-sm-4 control-label wow fadeInDown">Email</label>
                    <div class="col-sm-6">
                    <input type="email" class="form-control wow fadeInDown" id="email" name="email" placeholder="<?php echo $email?>"required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="batch" class="col-sm-4 control-label wow fadeInDown">Batch</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control wow fadeInDown" id="batch" name="batch" placeholder="<?php echo $batch;?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="course" class="col-sm-4 control-label wow fadeInDown">Course</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control wow fadeInDown" id="Course" name="Course" placeholder="<?php echo $course;?>" required>
                    </div>
                </div>

                                <div class="form-group">
                                    <label for="department" class="col-sm-4 control-label wow fadeInDown">Department</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control wow fadeInDown" id="department" name="department" placeholder="<?php echo $dept;?>" required>
                                    </div>
                                </div>


                <hr>
                <em style="color:red;" class="wow fadeInDOwn"> Note Fill up the fields before hitting save changes button</em>
                <div class="form-group">

                    <center><input type="submit" class="btn  wow fadeInDown" name="update" value="Save Changes">
                </center></div>
              </form>
              </div>
        </div>

</div>
<?php
include("connect.php");
if(isset($_POST['update'])){
  $id = $_GET['edit'];
  $name = $_POST['proprietor_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $batch = $_POST['batch'];
  $course = $_POST['Course'];
  $dept = $_POST['department'];
      $sql=("UPDATE user SET Name='$name',
                   Phone_Number='$phone',
                   Email = '$email',
                   Batch='$batch',
                   Course='$course',
                   Department='$dept'
                   WHERE id='$id'") or die(mysqli_error());
      $result=mysqli_query($conn, $sql);

          echo "<script>alert('Save Successfully!');
                window.location.href='index.php';</script>";

          }
		mysqli_close($conn);
?>




<br><br><br><br><br>
<footer id="footer" class="midnight-blue wow fadeInDown">
        <?php include('footer.php');?>
    </footer><!--/#footer-->
</body>

</html>
