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
    <title>Approve Request</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
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


<br>
<div class = "contianer">
    <h3 style = "text-align: center;">Approve Request </h3>

<form class = "Approve" action = "" method = "post">
<input class = "form-control" type = "text" name = "approve" placeholder = "Approve or not" required = ""><br>
<input class = "form-control" type = "text" name = "issue" placeholder = "Issue Date dd-mm-yyyy" required = ""><br>
<input class = "form-control" type = "text" name = "return" placeholder = "Return Date dd-mm-yyyy" required = ""><br>
<button class = "btn btn-default" type = "submit" name = "submit">Approve</button>
</form>
</div>

<?php 
if(isset($_POST['submit']))
{
    mysqli_query($db, "UPDATE `issue_book` SET `approve` = '$_POST[approve]', `issue` = '$_POST[issue]', `return` = '$_POST[return]' WHERE username = 
    '$_SESSION[name]' and bid = '$_SESSION[bid]';");


    mysqli_query($db, "UPDATE books SET quantity = quantity-1 where bid = '$_SESSION[bid]'; ");

    $res=mysqli_query($db, "SELECT quantity from books where bid = '$_SESSION[bid]';");

    while($row=mysqli_fetch_assoc($res))
    {
        if($row['quantity']==0)
        {
            mysqli_query($db, "UPDATE books SET status = 'Not-Available' where bid = '$_SESSION[bid]';");
        }
    }
    ?>
    <script type = "text/javascript">
    alert("Updated successfully.");
    window.location = "all_requests.php"
    </script>
    <?php

}

?>





  </body>
</html>