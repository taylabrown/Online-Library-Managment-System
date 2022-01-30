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
    <title>Expired List</title>
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

       
<div class= "book-header" style = "padding-top: 2%; padding-left: 1%">
    <h2 style = "color: black; text-align: center;">Expired List</h2>
    </div>




<?php


if(isset($_SESSION['login_staff']))
{
  
  $sql= "SELECT user.username,books.bid,name,authors,edition,approve,issue,issue_book.return FROM user inner join issue_book 
  ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and
  issue_book.approve !='Yes'
  ORDER BY `issue_book`.`return` DESC";

$res = mysqli_query($db,$sql);






 echo "<div class = 'scroll'>";
 echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: black; color: white;'>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
                echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr style='background-color: white;'>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return']; echo "</td>";
				
				
				echo "</tr>";
			}
		echo "</table>";
    echo "</div>";
}
else{
  ?>
  <h3>Login to see Expired Books</h3>
  <?php
}
?>
</div>




  </body>
</html>