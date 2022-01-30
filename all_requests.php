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
      table{
        display: flex;
    justify-content: center;
    height: 250px;
    overflow: auto;
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




   
    <!-- Updated navbar for logged in staff members -->
    <?php
    if($_SESSION['login_staff'])
    {
      include "navbar_dropdown.php";
    }
    ?>


    <div class= "book-header" style = "padding-top: 2%; padding-left: 1%">
    <h2 style = "color: black; text-align: center;">Book Requests</h2>
    </div>

	<?php
	
	if(isset($_SESSION['login_staff']))
	{
    $q = mysqli_query($db, "SELECT * from issue_book");

		if(mysqli_num_rows($q)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: black; color: white;'>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Approve";  echo "</th>";
				echo "<th>"; echo "Issue";  echo "</th>";
				echo "<th>"; echo "Return";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='background-color: white;'>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center; color: black;">You need to login to see the request.</h4>
			
		<?php
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['username'];
		$_SESSION['bid']=$_POST['bid'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	}

	?>
	</div>
</div>

	<div class="container">
		<br>
		<h4 style = "color: black;">Please enter in the users details to approve or decline their request. </h4>
		<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<button style = "background-color: #F4DD47; border: 0; padding: 15px; width: 20%;  font-family: sans-serif; color: #ffffff; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer;" 
                type = "submit" name = "submit" class = "btn-default">Submit</button>
		</form>


</div>



  </body>
</html>