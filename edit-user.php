<?php
include "footer.php";
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Information</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <style type = "text/css">

    .form-control{
        width: 250px;
        height: 38px;
    }

    form{
        margin: auto;
    }

    label{
        color:white;
    }

    </style>

  </head>
  <body style = "background-color: black;">

   
    <!-- Updated navbar for logged in users members -->
    <?php
    if($_SESSION['login_user'])
    {
      include "navbar_user.php";
    }
    ?>



<?php
$sql = "SELECT * FROM user WHERE username = '$_SESSION[login_user]'";
$result = mysqli_query($db, $sql) or die (mysql_error());

while ($row = mysqli_fetch_assoc($result))
{
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $email=$row['email'];
  $username=$row['username'];
  $password=$row['password'];
}
?>



<br>
<h2 style = "text-align: center; color: #f4dd47; font-weight: bold; ">Edit Information</h2>

<div class = "profile_info" style = "text-align: center; color: white;">
<span>Welcome, </span>
<h4><?php echo $_SESSION['login_user']; ?></h4>
</div><br> <br>



<div class = "form">
<form action = "" method = "post" enctype = "multipart/dorm-data">
<label><h5><b>First Name: </b></h5></label>
<input class = "form-control" type = "text" name = "firstname" value = "<?php echo $firstname; ?>">

<label><h5><b>Last Name: </b></h5></label>
<input class = "form-control" type = "text" name = "lastname" value = "<?php echo $lastname; ?>">

<label><h5><b>Email: </b></h5></label>
<input class = "form-control" type = "text" name = "email"  value = "<?php echo $email; ?>">

<label><h5><b>Username: </b></h5></label>
<input class = "form-control" type = "text" name = "username" value = "<?php echo $username; ?>">

<label><h5><b>Password: </b></h5></label>
<input class = "form-control" type = "text" name = "password" value = "<?php echo $password; ?>">

<div style = "padding-left: 100px;">
<button class = "btn-default" type = "submit" name = "submit">Save</button>
</div>
</form>
</div>

<?php

if(isset($_POST['submit']))
{
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sqli1= "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', username = '$username', password = '$password' 
  WHERE username = '".$_SESSION['login_user']."'; ";

  if(mysqli_query($db, $sqli1))
  {
    ?>
    <script type = "text/javascript">
    alert("Saved Successfully.");
    window.location = "user-profile.php";
    </script>
    <?php
  }
}
?>




</body>
</html>