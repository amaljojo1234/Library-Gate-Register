<?php
  include('connect.php');
  $sql = "select * from user  order by id desc ";
  $retrieve_data = mysqli_query($conn,$sql);
  $html='<table>
            <tr>
              <td>ID</td>
              <td>RFID</td>
              <td>Name</td>
              <td>Batch</td>
              <td>Course</td>
              <td>Department</td>
              <td>Number</td>
              <td>Email</td>
              <td>Username</td>
              <td>Password</td>
              <td>role</td>
            </tr>';
  while($row = mysqli_fetch_assoc($retrieve_data)){
      $html.='<tr>
          <td>'.$row['ID'].'</td>
          <td>'.$row['RFID'].'</td>
          <td>'.$row['Name'].'</td>
          <td>'.$row['Batch'].'</td>
          <td>'.$row['Course'].'</td>
          <td>'.$row['Department'].'</td>
          <td>'.$row['Phone_Number'].'</td>
          <td>'.$row['Email'].'</td>
          <td>'.$row['Username'].'</td>
          <td>'.$row['Password'].'</td>
          <td>'.$row['role'].'</td>

        </tr>';
    }
    $html.='</table>';
    header('Content-Type:application/xls');
    header('Content-Disposition:attachment;filename=report.xls');
    echo $html;
