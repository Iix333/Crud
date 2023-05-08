<?php
include "connection.php";
$id=$_GET["id"];

$firstname="";
$lastname="";
$email="";
$contact="";

$res=mysqli_query($link,"select * from user where id=$id");
while($row=mysqli_fetch_array($res))
{
  $firstname=$row["firstname"];
  $lastname=$row["lastname"]; 
  $email=$row["email"];
  $contact=$row["contact"];
}
?>

<html lang="en">
<head>
  <title>Edit Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<style>
  .input-group {
    margin-bottom: 35px;
  }
</style>

<div class="container">
<div class="cool-1g-4">	

  <h2><b>UPDATE USER</b></h2>

  <form action="" name="form1" method="post"> 
    <div class="input-group">

      <input type="text" class="input" id="firstname" placeholder=" " name="firstname" value="<?php echo $firstname; ?>" > <label class="placeholder">Enter Firstname</label>
    </div>

    <div class="input-group">
      <input type="text" class="input" id="lastname" placeholder=" " name="lastname" value="<?php echo $lastname; ?>" > <label class="placeholder">Enter Lastname</label>
    </div>

    <div class="input-group">
      <input type="text" class="input" id="email" placeholder=" " name="email" value="<?php echo $email; ?>" > <label class="placeholder">Enter Email</label>
    </div>

    <div class="input-group">
    <input type="text" class="input" id="contact" placeholder=" " name="contact" value="<?php echo $contact; ?>" > <label class="placeholder">Enter Contact</label>
    </div>

    <button  style='background-color: #ADEFD1FF; color: #00203FFF;' type="submit" name="update" class="btn btn-default">Save & Change</button>


  </form>
</div>
</div>

 
</div>



</body>

 <?php
 if (isset($_POST["update"])) 
 {

   mysqli_query($link,"update user set firstname='$_POST[firstname]', lastname='$_POST[lastname]', email='$_POST[email]', contact='$_POST[contact]' where id=$id");

   
   ?>
   <script type="text/javascript">
    window.location="index.php";
   </script>
   <?php  
 }
 


 ?>
 <button onclick="goBack()" class="btn btn-default">Back</button>
 <script>
function goBack() {
  window.history.back();
}
</script> 
</html>