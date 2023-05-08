<?php
include "connection.php";
session_start();

// check if form was submitted
if (isset($_POST["insert"])) {
   // insert data into database
   mysqli_query($link,"insert into user values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[contact]')");

   // set message in session variable
   $_SESSION["message"] = "New data added successfully.";

   // redirect to this page with GET request
   header("Location: ".$_SERVER["PHP_SELF"]);
   exit();
}

// check if there's a message in session variable
if (isset($_SESSION["message"])) {
   // show message to user
   echo "<div class='alert alert-success'>".$_SESSION["message"]."</div>";

   // remove message from session variable
   unset($_SESSION["message"]);
}
?>

<html lang="en">
<head>

  <title>Basic Database Connection using PHP and MySql</title>
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
    margin-bottom: 20px;
  }
</style>

<div class="container">
<div class="cool-1g-4">	

  <h2><b>Input Personal Data</b></h2>

  <form action="" name="form1" method="post"> 
    <div class="input-group">

      <input type="text" class="input" id="firstname" placeholder=" " name="firstname" required /> <label class="placeholder">Enter Firstname</label>
    </div>

    <div class="input-group">
      <input type="text" class="input" id="lastname" placeholder=" " name="lastname" required /> <label class="placeholder">Enter Lastname</label>
    </div>

    <div class="input-group">
      <input type="text" class="input" id="email" placeholder=" " name="email" required  /> <label class="placeholder">Enter Email</label>
    </div>

    <div class="input-group">
    <input type="text" class="input" id="contact" placeholder=" " name="contact" required  /> <label class="placeholder">Enter Contact</label>
    </div>

    <button  style='background-color: #ADEFD1FF; color: #00203FFF;' type="submit" name="insert" class="btn btn-default">Register User</button>


  </form>
</div>
</div>

<div class="cool-1g-12">	
<table class="table table-bordered">
    <thead>
      <tr>
	  <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		<th>Contact</th>
		<th>Actions</th>
      </tr>
    </thead>
    <tbody>

   <?php
$res=mysqli_query($link,"select * from user");
while($row=mysqli_fetch_array($res))
{
	echo"<tr>";
	echo"<td>"; echo $row["id"]; echo "</td>";
	echo"<td>"; echo $row["firstname"]; echo "</td>";
	echo"<td>"; echo $row["lastname"]; echo "</td>";
	echo"<td>"; echo $row["email"]; echo "</td>";
	echo"<td>"; echo $row["contact"]; echo "</td>";
	echo"<td>"; ?> <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a> <a href="edit.php?id=<?php echo $row["id"];?>"> <button type="button" class="btn btn-success">Edit</button> <a href="delete.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-danger">Delete</button> <?php echo"</td>";
	echo"</tr>";


}

?>

</tbody>
</table>
</div>



</body>

<?php
if (isset($_POST["insert"])) 
{
  mysqli_query($link, "insert into user values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[contact]')");
  
  // Redirect to the same page to avoid duplicate form submissions
  header("Location: index.php");
  exit();
}

// Close the database connection
mysqli_close($link);

//   if (isset($_POST["delete"])) 
//  {
//   mysqli_query($link,"delete from user where firstname='$_POST[firstname]'") or die (mysqli_error($link));
//  }
?>

	
	
</html>