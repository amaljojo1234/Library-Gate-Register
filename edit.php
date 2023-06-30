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
                             <li><a href="edit.php">EDIT STUDENTS</a></li>
                             <li><a href="editfac.php">EDIT FACULTY</a></li>
                             <li><a href="student1.php">LOG FILE</a></li>
                             </ul>
                       </li>
                      <li><a href="logout.php">lOGOUT</a></li>
                  </ul>
              </div>
            </div>
</nav><div class="connect">
<br><br><br><br><center><p style="color:red;font-size:30px;"><b>USER DETAILS</b></p></center>
<br><br>
<table border="1" id="userTable">
  <tr>
            <td width="5%">ID</td>
            <td width="10%">RFID</td>
            <td width="15%">Name</td>
            <td width="10%">Batch</td>
            <td width="10%">Course</td>
            <td width="10%">Department</td>
            <td width="20%">Phone_Number</td>
            <td width="10%">Email</td>
            <td width="50%">Action</td>
  </tr>
  <?php include('connect.php');
    $sql = "select * from user  where role='student' order by id desc ";
    $sno = 1;
    $retrieve_data = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($retrieve_data)){
        $ID = $row['ID'];
        $RFID = $row['RFID'];
        $Name = $row['Name'];
        $Batch = $row['Batch'];
        $Course = $row['Course'];
        $Department = $row['Department'];
        $Phone_Number = $row['Phone_Number'];
        $Email = $row['Email'];?>
    <tr>
        <td><?php echo $ID; ?></td>
        <td><?php echo $RFID; ?></td>
        <td><?php echo $Name; ?></td>
        <td><?php echo $Batch; ?></td>
        <td><?php echo $Course; ?></td>
        <td><?php echo $Department; ?></td>
        <td><?php echo $Phone_Number; ?></td>
        <td><?php echo $Email; ?></td>
        <td><form method="get" action="editstu.php"><button name="edit" value="<?php echo $ID;?>">Edit</button></form>
          <form method="get" action="deletestu.php"><button name="delete" value="<?php echo $ID;?>">Delete</button></form></td>
    </tr>
    <?php    $sno++;
    }
   ?>
</table>

            <br><br><br><br><br><br>
</div>
<footer id="footer" class="midnight-blue wow fadeInDown">
        <?php include('footer.php');?>
    </footer><!--/#footer-->
</body>

</html>
