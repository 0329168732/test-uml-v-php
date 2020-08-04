<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

  <div class ="container">
    <div class= "col-md-12">
    <h3>ĐIỀN THÔNG TIN</h3>
    <form method="POST" id="insert_data">
      <label>Firsname</label>
      <input type="text" class="form-control" id="firstname" placeholder="Firstname">
      <label>Surname</label>
      <input type="text" class="form-control" id="surname" placeholder="Surname">
      <label>Email</label>
      <input type="text" class="form-control" id="email" placeholder="Email"><br>
      <button type="button" class="btn btn-danger col-sm-5" id="insert_button" style="width:300px;" onclick="add()">Add</button><br>
   
    </form>
    <h3> DATABASE</h3>
    <div id ="load_data" >
    
     </div>
    </div>
  </div>
  <script type="text/javascript">

    // show data
  $(document).ready(function(){
    function fetch_data(){
      $.ajax({
          url:"xulibieumau.php",
          type:"post",
          success: function ($sql_select) {
           
            $('#load_data').html($sql_select);
            // fetch_data();
          }
          })
    }
    fetch_data();


    //sua du lieu
    function edit_data(id, text, column_name){
      $.ajax({
          url:"xulibieumau.php",
          type:"post",
          data:{I:id, T:text, column_name},
          success: function (result1) {
            alert('edit du lieu thanh cong');
            fetch_data();
          }
          })
    }
    $(document).on('blur','.firstname', function(){
      var id =$(this).data('id1');
      var text = $(this).text();
      edit_data(id, text,"first_name");
    })
    $(document).on('blur','.surname', function(){
      var id =$(this).data('id2');
      var text = $(this).text();
      edit_data(id, text,"surname");
    })
    $(document).on('blur','.email', function(){
      var id =$(this).data('id3');
      var text = $(this).text();
      edit_data(id, text,"email");
    })

    //insert du lieu
    $('#insert_button').on('click', function(){
        var firstname = $('#firstname').val();
        var surname = $('#surname').val();
        var email= $('#email').val();
        if(firstname== '' || surname== '' || email== ''){
          alert('khong duoc bo trong');
        }else{
        //alert(firstname)
        $.ajax({
          url:"xulibieumau.php",
          type:"post",
          data:{F_name:firstname ,Sur:surname, E:email},
          success: function (result) {
            alert('insert du lieu thanh cong');
            $('#insert_data')[0].reset();
            fetch_data();
          }
          })
        }
      })
  })
 

      
  </script>
  
</body>
</html>