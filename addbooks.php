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
    <h2 style = "text-align: center; color: black;">Add a new book</h2>
    </div>


<form class = "book" action= "" method= "post">

    <input type="text" name="bid" class="form-control" placeholder = "Book ID:" required = "">
    <br>
    <input type="text" name="name" class="form-control" placeholder = "Book Name:" required = "">
    <br>
    <input type="text" name="authors" class="form-control" placeholder = "Authors:" required = "">
    <br>
    <input type="text" name="edition" class="form-control" placeholder = "Edition:" required = "">
    <br>
    <input type="text" name="status" class="form-control" placeholder = "Status:" required = "">
    <br>
    <input type="text" name="quantity" class="form-control" placeholder = "Quantity:" required = "">
    <br>
    <input type="text" name="department" class="form-control" placeholder = "Department:" required = "">

    <button style = "background-color: #f4dd47; border: 0; margin: 20px; padding: 15px; width: 30%;  font-family: sans-serif; color: #ffffff; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer;"
    class = "btn-default" type = "submit" name = "submit">Add</button>
</form>
</div>

<?php
if (isset($_POST['submit']))
{
if(isset($_SESSION['login_staff']))
{
    mysqli_query($db, "INSERT INTO books VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]');");
    ?>
    <script type = "text/javascript">
    alert("Book Added Successfully");
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
