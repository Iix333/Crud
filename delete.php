<?php include "connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Record</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
$id = $_GET["id"];
if(isset($_POST['confirm'])) {
  mysqli_query($link, "delete from user where id=$id");
  echo "<script>alert('Record successfully deleted!');</script>";
  echo "<script>window.location='index.php';</script>";
}
?>

<div class="container">
  <form method="post">
    <p>Are you sure you want to delete this record?</p>
    <button type="submit" name="confirm" class="btn btn-danger">Yes</button>
    <a href="index.php" class="btn btn-default">No</a>
  </form>
</div>

</body>
</html>
