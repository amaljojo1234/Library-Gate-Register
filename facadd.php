<?php
include("connect.php");
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $dept=$_POST['department'];
    $ph_no = $_POST['phn_no'];
    $email = $_POST['email'];
    $password = $_POST['Pasword'];
    $spassword = $_POST['spasword'];
    $username=$_POST['Username'];
    if($password!=$spassword){
        echo '<script>alert("Password not same!");</script>';
    }
    else{
	     $result = "INSERT INTO `user` VALUES ('','','$name','','','$dept','$ph_no','$email','$Username','$Password','faculty')";
	      $register_result=mysqli_query($conn,$result);
        if($register_result)
	       {
		         if(mysqli_affected_rows($conn)>0){
                echo '<script>alert("Registration Successfull!");</script>';
            }else{
              echo '<script>alert("Registration Unsuccessfull!");</script>';
            }
          }
      }
}
?>

<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">


</head>
<body bgcolor="black">
<center>
  <div class="main">
      <section class="signup">
          <div class="container">
              <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                  <h2 class="form-title">Add New Faculty</h2>


                  <div class="form-group">
                      <input type="text" class="form-input" name="name" id="name" placeholder="Name" required/>
                  </div>

                <div class="form-group">
                      <input type="text" class="form-input" name="department" id="department" placeholder="Department" required/>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-input" name="phn_no" id="phn_no" placeholder="Phone Number" required/>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-input" name="email" id="email" placeholder="Your email" required/>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-input" name="Username" id="Username" placeholder="UserName" required/>
                  </div>

                  <div class="form-group">
                        <input type="password" class="form-input" name="Pasword" id="Password" placeholder="Password" required/>
                    </div>

                    <div class="form-group">
                          <input type="password" class="form-input" name="spasword" id="spassword" placeholder="Confirm Password" required/>
                      </div>

                  <div class="form-group">
                      <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                  </div>

</form>
</div></div></section></div>
</center>
</body>
</html>
