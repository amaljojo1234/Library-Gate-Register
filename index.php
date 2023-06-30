<?php
session_start();
if(isset($_SESSION['student'])) {

    include('student.php');

}
else if(isset($_SESSION['faculty'])) {

    include('faculty.php');

}
else if(isset($_SESSION['admin'])) {

    include('admin.php');

}

else{?>
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
  h1 {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 30px;
 text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
}
.elegantshd {
  color: #131313;

  letter-spacing: .15em;
}
h2 {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 17px;
 text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
}
h3 {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 13px;
 text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
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
                       <li class="active"><a href="main.php"><i class="fa fa-home"></i>LOGIN</a></li>


                  </ul>
              </div>
            </div>
          </nav>

<form id="Form" action="" method="GET">
    <input id="here"name="rfid" type="text" value="" autofocus/>
      <input id="subHere" name="submit" type="submit" value="Submit"  />
</form>


<script>
    var input = document.querySelector('#here');
    input.addEventListener('keyup', checkLength);
    function checkLength(e){
        if(e.target.value.length==10){
            document.forms["Form"].submit();
            }
    }

</script>
</body>
      <?php
      if(isset($_GET['submit'])){
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
            $sql="SELECT * FROM user WHERE ID='$id'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $sql="SELECT * FROM librarydata WHERE ID='$id' order by Exit_time DESC";
            $result=mysqli_query($conn,$sql);
            $d = mysqli_fetch_assoc($result);
            $name=$row['Name'];
            $dept=$row['Department'];
            $time=$d['Exit_time'];?>

            <h1 class="elegantshd"> Come Back Later <?php echo $name;  ?> </h1>
            <h2 class="elegantshd" style="size:20px;">Department:  <?php echo $dept; ?> </h2>
            <h3 class="elegantshd" style="size:20px;">Exit Time:  <?php echo $time ; ?> </h3>


           <?php


          }
          else{
            $sql="insert into librarydata(id,Enrty_Time) values($id,now())";
            $result=mysqli_query($conn,$sql);
            $sql="SELECT * FROM user WHERE ID='$id'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $sql="SELECT * FROM librarydata WHERE ID='$id' order by Enrty_Time DESC";
            $result=mysqli_query($conn,$sql);
            $d = mysqli_fetch_assoc($result);

            $name=$row['Name'];
            $dept=$row['Department'];
            $time=$d['Enrty_Time'];?>
            <h1 class="elegantshd"> Welcome <?php echo $name; ?></h1>
            <h2 class="elegantshd" style="size:20px;">Department:  <?php echo $dept; ?> </h2>
            <h3 class="elegantshd" style="size:20px;">Entry Time:  <?php echo $time ; ?> </h3>


            <?php

          }
        }
          else{
            $sql="insert into librarydata(id,Enrty_Time) values($id,now())";
            $result=mysqli_query($conn,$sql);
            $sql="SELECT * FROM user WHERE ID='$id'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $sql="SELECT * FROM librarydata WHERE ID='$id' order by Enrty_Time DESC";
            $result=mysqli_query($conn,$sql);
            $d = mysqli_fetch_assoc($result);

            $name=$row['Name'];
            $dept=$row['Department'];
              $time=$d['Enrty_Time'];?>
            <h1 class="elegantshd"> Welcome <?php echo $name; ?></h1>
            <h2 class="elegantshd" style="size:20px;">Department:  <?php echo $dept; ?> </h2>
            <h3 class="elegantshd" style="size:20px;">Entry Time:  <?php echo $time ; ?> </h3>


            <?php

          }
        }
        else{
          echo '<script>
  				  	window.alert("Your not registered user!");
              window.location.href="index.php";
  				        </script>';
        }
      }
        ?>




<?php

      include('connect.php');
      $count=0;
      $now=0;
        $sql="SELECT distinct ID FROM librarydata ";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
        while($dd=mysqli_fetch_array($res)){
          $count=$count+1;;
        }}
        $sql="SELECT * FROM librarydata ";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
        while($dd=mysqli_fetch_array($res)){
          $ext=$dd['Exit_time'];
          if($ext==''){
            $now=$now+1;
          }
        }}
       ?>

<div style="float:right;background:#3a565a; margin-right:30px;"><b><p style="padding:30px;color:white;font-size:30px;padding-right:170px;">Login Detail</p><b><hr>
<p style="padding:30px;color:white;font-size:20px;">Inside:<?php echo $now; ?></p>
<p style="padding:30px;color:white;font-size:20px;">The Month:<?php echo $count; ?></p>


</div>


</html>
<?php }?>
