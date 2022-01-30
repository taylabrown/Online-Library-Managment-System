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
    <title>Add Books</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

     <!-- Latest compiled and minified CSS -->
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .book{
            width: 400px;
            margin: 0px auto;
        }
    </style>

  </head>
  <body>
    <div style="background-image: url('Books.jpg')"></div>

    <!-- Updated navbar for logged in staff members -->
    <?php
    if($_SESSION['login_staff'])
    {
      include "navbar_dropdown.php";
    }
    ?>


<div class= "book-header" style = "padding-top: 2%; padding-left: 1%">
    <h2 style = "text-align: center; color: black;">Add User</h2>
    </div>


<form class = "book" action= "" method= "post">

    <input type="text" name="firstname" class="form-control" placeholder = "First Name:" required = "">
    <br>
    <input type="text" name="lastname" class="form-control" placeholder = "Last Name:" required = "">
    <br>
    <input type="text" name="id" class="form-control" placeholder = "ID:" required = "">
    <br>
    <input type="text" name="email" class="form-control" placeholder = "Email:" required = "">
    <br>
    <input type="text" name="username" class="form-control" placeholder = "Username:" required = "">
    <br>
    <input type="text" name="password" class="form-control" placeholder = "Password:" required = "">
    <br>

    <button style = "background-color: #f4dd47; border: 0; margin: 20px; padding: 15px; width: 30%;  font-family: sans-serif; color: #ffffff; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer;"
    class = "btn-default" type = "submit" name = "submit">Add</button>
</form>
</div>

<?php
if (isset($_POST['submit']))
{
if(isset($_SESSION['login_staff']))
{
    mysqli_query($db, "INSERT INTO user VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[id]', '$_POST[email]', '$_POST[username]', '$_POST[password]');");
    ?>
    <script type = "text/javascript">
    alert("User Added Successfully");
    </script>
    <?php
}
else{
    ?>
    <script type = "text/javascript">
    alert("You need to login");
    </script>
    <?php
}
}

?>





</body>
</html>
