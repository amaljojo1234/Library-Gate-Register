
<?php
session_start();

?>
<!DOCTYPE html>
<?php
require_once("connect.php"); ?>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">


</head>
<body bgcolor="black">
<center>
  <div class="main">
      <section class="signup">
          <div class="container">
              <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                  <h2 class="form-title">Login</h2>

                  <div class="form-group">
                      <input type="text" class="form-input" name="username" id="username" placeholder="Username" required/>
                  </div>

                  <div class="form-group">
                      <input type="password" class="form-input" name="Password" id="Password" placeholder="Password" required/>
                  </div>

                  <div class="form-group">
                      <input type="submit" name="sublogin" id="submit" class="form-submit" value="Sign up"/>
                  </div>

</form>
</div></div></section></div>
</center>
</body>
</html>
<?php
if(isset($_POST['sublogin'])){
  $uname=$_POST['username'];
  $pass=$_POST['Password'];
	if($uname==""||$pass==""){
		echo '<script>
				window.alert("Enter a Value")
				window.location.href="index.php";
			</script>';
	}else{
  	$sql="SELECT * FROM user WHERE Username='$uname' AND Password='$pass'";
  	$result=mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0){
			 while ($row = mysqli_fetch_assoc($result)){
				 $user=$row['role'];
			 }
  			if($user=="admin"){
					$_SESSION['admin']=$uname;

  			}
				else if($user=="student"){
					$_SESSION['student']=$uname;

  			}
				else {
					$_SESSION['faculty']=$uname;

  			}
	header("location:index.php");
			}else{
       echo("Username and password is not matching");
  	}
}}
?>
