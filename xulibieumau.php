<?php

define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'test');
$connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


// if(mysqli_connect_errno())
// {
//     echo "fail ". mysqli_connect_errno();
// }else{
//     echo 'true';
// }

//chen du lieu
if(isset($_POST['F_name'])){
    $firstname =$_POST["F_name"]; 
    $surname = $_POST["Sur"]; 
    $email = $_POST["E"]; 

    $sql = "INSERT INTO members (first_name,surname,email) VALUES ('$firstname','$surname','$email')";
    $result = mysqli_query($connect, $sql);
    if ($result) 
     return 1;
     else 
      echo "Error: " ;
    }
    //edit
    if(isset($_POST['I'])){
      $id =$_POST["I"]; 
      $text = $_POST["T"]; 
      $column_name = $_POST["column_name"]; 
  
      $sql1 = "UPDATE  members SET $column_name='$text' where id ='$id'";
      $result1 = mysqli_query($connect, $sql1);
      }
    //show
    $output = '';
    $sql_select = mysqli_query($connect, "SELECT * FROM members ORDER BY id DESC");
    $output .= '
      <div class="table table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>FIRSTNAME</td>
              <td>SURNAME</td>
              <td>EMAIL</td>
            </tr>
         
     
    ';

    if(mysqli_num_rows($sql_select) > 0 ){
        while($rows = mysqli_fetch_array($sql_select)){
          $output .= '
            <tr>
              
              <td class= "firstname" data-id1='.$rows["id"].' contenteditable>'.$rows["first_name"].'</td>
              <td class= "surname" data-id2='.$rows["id"].'  contenteditable>'.$rows["surname"].'</td>
              <td class="email" data-id3='.$rows["id"].' contenteditable>'.$rows["email"].'</td>
            </tr>
          
          
          ';
        }
    }else{
      $output .= '
        <tr>
                <td colspan = "3">du lieu chua co</td>
        </tr>';
    }
    $output .= ' 
    
    </table> </div>
    ';
    echo $output;
?>