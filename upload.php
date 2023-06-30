<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">


</head>
<body bgcolor="black">


<?php
include "connect.php";

if(isset($_POST['but_import'])){
  if(isset($_FILES["importfile"])){

   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["importfile"]["name"]);

   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

   $uploadOk = 1;
   if($imageFileType != "csv" ) {
     $uploadOk = 0;
   }

   if ($uploadOk != 0) {
      if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir.'importfile.csv')) {

        // Checking file exists or not
        $target_file = $target_dir . 'importfile.csv';
        $fileexists = 0;
        if (file_exists($target_file)) {
           $fileexists = 1;
        }
        if ($fileexists == 1 ) {

           // Reading file
           $file = fopen($target_file,"r");
           $i = 0;

           $importData_arr = array();

           while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($data);

             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = mysqli_real_escape_string($conn, $data[$c]);
             }
             $i++;
           }
           fclose($file);

           $skip = 0;
           // insert import data
           foreach($importData_arr as $data){
              if($skip != 0){
                $ID = $data[0];
                $RFID = $data[1];
                $Name = $data[2];
                $Batch = $data[3];
                $Course = $data[4];
                $Department = $data[5];
                $Phone_Number = $data[6];
                $Email =$data[7];
                $Username =$data[8];
                $Password =$data[9];


                 // Checking duplicate entry
                 $sql = "select count(*) as allcount from user where ID='" . $ID . "' and RFID='" . $RFID . "' and  Name='" . $Name . "' and  Batch='" . $Batch . "' and  Course='" . $Course . "' and  Department='" . $Department . "' and  Phone_Number='" . $Phone_Number . "'and  Email='" . $Email ."' ";


                 $retrieve_data = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($retrieve_data);
                 $count = $row['allcount'];

                 if($count == 0){
                    // Insert record
                    $insert_query = "insert into user(ID,RFID,Name,Batch,Course,Department,Phone_Number,Email,Username,Password,role) values('".$ID."','".$RFID."','".$Name."','".$Batch."','".$Course."','".$Department."','".$Phone_Number."','".$Email."','".$Username."','".$Password."','student')";
                    mysqli_query($conn,$insert_query);
                 }
              }
              $skip ++;
           }
           $newtargetfile = $target_file;
           if (file_exists($newtargetfile)) {
              unlink($newtargetfile);
           }
         }
       }
      }
   }
   else{
     echo '<script>
         window.alert("Please Upload A File")
         window.location.href="upload.php";
       </script>';
   }
}
?>
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
              <form method="POST" id="signup-form" class="signup-form">
                <div class="form-group">
                    <input type="file" class="form-input" name="importfile" id="importfile" placeholder="Id"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="but_import" id="but_import" class="form-submit" value="Import"/>
                </div>
              </form>
              </div></div></section></div>
</body>
</html>
