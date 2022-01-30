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
    <title>Delete Books</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
   table{
        display: flex;
    justify-content: center;
    height: 450px;
    overflow: auto;
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



    <!--- Search Bar -->

    <div class= "book-header" style = "padding-top: 2%; padding-left: 1%">
    <h2 style = "color: black; text-align: center;">Delete a User</h2>
    </div>


    <div class = "srch" style = "padding-top: 1%; padding-bottom: 1%; padding-left: 1%;">
        
                <form style = "text-align: center; class = "search-button" method = "post" name = "form1">
            <div>
                <input style= "height: 50px;" class = "" type = "text" name = "id" placeholder = "Enter User ID" >
                <button style = "background-color: #f4dd47; border: 0; padding: 15px; width: 10%;  font-family: sans-serif; color: #ffffff; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer;" 
                type = "submit" name = "submit1" class = "btn-default">Delete</button>
           </div>
    </div>


<?php
if(isset($_POST['submit1']))
{
    if(isset($_SESSION['login_staff']))
    {
        mysqli_query($db, "DELETE from user where id = '$_POST[id]';");
        ?>
         <script type = "text/javascript">
         alert("User Deleted Successfully");
         </script>
         <?php
    }
    else{
        ?>
        <script type = "text/javascript">
        alert("Need To Login");
        </script>
        <?php
    }
}
?>



    
    <!-- Book Table -->

    <?php
$result = mysqli_query($db, "SELECT * FROM user"); // Orders book by name
?>

<table class = 'table table-bordered '>
    <tr style='background-color: black; color: white;'>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Username</th>
    </tr>
    <?php

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr style = 'background-color: white;'>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['firstname'] ?></td>
        <td><?php echo $row['lastname'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['username'] ?></td>
    </tr>
    <?php
}
?>
</table>



  </body>
</html>