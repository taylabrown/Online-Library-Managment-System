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
    <title>All Book Requests</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

	<style>

     h2{
        padding-top: 1%;
        color: #f4dd47;
        font-weight: bold;
      }

		  .container{
		  text-align: center;
    justify-content: center;
    height: 250px;
	width: 600px;
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

    <div class = "container">
    <div class= "book-header" style = "padding-top: 2%; padding-left: 1%">
    <h2 style = "color: black;">Check Out Book</h2>
    </div>


    <div class = "srch" style = "padding-top: 1%; padding-bottom: 1%; padding-left: 1%;">
        
                <form class = "search-button" method = "post" name = "form1">
            <div>
                <input class = "form-control" type = "text" name = "username" placeholder = "Enter Username" ><br>
                <input class = "form-control" type = "text" name = "bid" placeholder = "Enter Book ID" ><br>
                <input class = "form-control" type = "text" name = "approve" placeholder = "Approve or not" required = ""><br>
                <input class = "form-control" type = "text" name = "issue" placeholder = "Issue Date dd-mm-yyyy" required = ""><br>
                <input class = "form-control" type = "text" name = "return" placeholder = "Return Date dd-mm-yyyy" required = ""><br>
                <button style = "background-color: #F4DD47; border: 0; padding: 15px; width: 2 0%;  font-family: sans-serif; color: #ffffff; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer;" 
                type = "submit" name = "submit" class = "btn-default">Confirm</button> <br>
           </div>
    </div> <br>

  </div>
    
<?php
if (isset($_POST['submit']))
{
if(isset($_SESSION['login_staff']))
{
    mysqli_query($db, "INSERT INTO issue_book  VALUES ('$_POST[username]', '$_POST[bid]', '$_POST[approve]',  
    '$_POST[issue]','$_POST[return]');");



mysqli_query($db, "UPDATE books SET quantity = quantity -1 where bid = '$_POST[bid]'; ");

$res=mysqli_query($db, "SELECT quantity from books where bid = '$_POST[bid]';");

while($row=mysqli_fetch_assoc($res))
{
    if($row['quantity']==0)
    {
        mysqli_query($db, "UPDATE books SET status = 'Not-Available' where bid = '$_POST[bid]';");
    }
}

?>


    
    <script type = "text/javascript">
    alert("Book Checked Out Successfully");
    window.location = "all_requests.php"
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