<?php
include "connection.php";

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  $res = mysqli_query($link, "SELECT * FROM user WHERE id = $id");

  if(mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_assoc($res);

    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    $contact = $row["contact"];

    // display the user record in a table
    echo "<div class='user-details'>";
    echo "<h2>User Details</h2>";
    echo "<table class='table'>";
    echo "<tr><td>Firstname:</td><td>$firstname</td></tr>";
    echo "<tr><td>Lastname:</td><td>$lastname</td></tr>";
    echo "<tr><td>Email:</td><td>$email</td></tr>";
    echo "<tr><td>Contact:</td><td>$contact</td></tr>";
    echo "</table>";
    echo "</div>";

    // display the back button 
    echo "<div class='button-container'>";
    echo "<button onclick='goBack()' style='background-color: #ADEFD1FF; color: #00203FFF;' class='btn btn-default'>Back</button>";
    echo "</div>";
  }
  else {
    echo "User record not found.";
  }
}
else {
  echo "Invalid request.";
}
?>

<head>
  <title>View Record</title>
</head>

<style>
  body {
    background: #EA738DFF;
    
  }

  .user-details {
    margin: 0 auto;
    width: 400px;
    padding: 20px;
    color: #00203FFF;
    background-color: #ADEFD1FF;
    box-shadow: 25px 25px 10px rgba(0, 0, 0, 0.2);
  }

  .user-details table {
    border-collapse: collapse;
    width: 100%;
  }

  .user-details td {
    padding: 10px;
  }

  .button-container {
    display: flex;
    justify-content: center;
    margin-top: 30px;
  }

  .btn-default {
    margin-top: 20px;
  }
</style>

<script>
  function goBack() {
    window.history.back();
  }
</script>
