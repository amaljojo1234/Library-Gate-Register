
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
<style>
.cards1{
min-width: 20%;
min-height:20%;
background-color: black;
border-radius: 5px;
display: inline-block;
margin:10px;

}
.cards1:hover{
  box-shadow:2px 2px 10px black;
}
.image1 img{
width:100%;
border-radius: 50px;
}
.title1{
  text-align: center;
  padding: 50px;
}
.jj{
  padding-top: 100px;
  }</style>
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



                      <li><a href="logout.php">lOGOUT</a></li>
                  </ul>
              </div>
            </div>
          </nav>
          <div class="jj">
            <div class="pro">
              <?php include('dashboard.php')?>
            </div>
          </div>
</html>
