<?php
include "connection.php";
include "footer.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Books</title>



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






    <!-- Updated navbar for logged in users -->
    <?php
    if($_SESSION['login_user'])
    {
      include "navbar_user.php";
    }
    ?>



    <!--- Search Bar -->

    <div class= "book-header" style = "padding-top: 2%; padding-left: 1%">
    <h2 style = "color: black; text-align: center;">List of Books</h2>
    </div>


    <div class = "srch" style = "padding-top: 1%; padding-bottom: 1%; padding-left: 1%;">
        <form style = "text-align: center;" class = "search-button" method = "post" name = "form1">
            <div>
                <input style= "height: 50px;" class = "" type = "text" name = "search" placeholder = "Search by name" required="">
                <button style = "background-color: #f4dd47; border: 0; padding: 15px; width: 10%;  font-family: sans-serif; color: #ffffff; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer;" 
                type = "submit" name = "submit" class = "btn-default">Search</button>
</div>
</div>

<?php

if(isset($_POST['submit']))
{
  $q=mysqli_query($db, "SELECT * from books where name like '%$_POST[search]%' ");

  if(mysqli_num_rows($q)==0){
    echo "Sorry, no books found.";
  }
  else{
    
    echo "<table class = 'table table-bordered ' >";
    echo "<tr style = 'background-color: black; color: white;'>";

    echo "<th>"; echo "BID"; echo "</th>";
    echo "<th>"; echo "Book Name"; echo "</th>";
    echo "<th>"; echo "Author Name"; echo "</th>";
    echo "<th>"; echo "Edition"; echo "</th>";
    echo "<th>"; echo "Status"; echo "</th>";
    echo "<th>"; echo "Quantity"; echo "</th>";
    echo "<th>"; echo "Department"; echo "</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($q)) 
    {
      echo "<tr>";
      echo "<td>"; echo $row['bid']; echo "</td>";
      echo "<td>"; echo $row['name']; echo "</td>";
      echo "<td>"; echo $row['authors']; echo "</td>";
      echo "<td>"; echo $row['edition']; echo "</td>";
      echo "<td>"; echo $row['status']; echo "</td>";
      echo "<td>"; echo $row['quantity']; echo "</td>";
      echo "<td>"; echo $row['department']; echo "</td>";
      echo "</tr>";
    }
    echo "</table>";

  }

}

else
{
  $res = mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
  echo "<table class = 'table table-bordered ' >";
    echo "<tr style = 'background-color: black; color: white;'>";

    echo "<th>"; echo "BID"; echo "</th>";
    echo "<th>"; echo "Book Name"; echo "</th>";
    echo "<th>"; echo "Author Name"; echo "</th>";
    echo "<th>"; echo "Edition"; echo "</th>";
    echo "<th>"; echo "Status"; echo "</th>";
    echo "<th>"; echo "Quantity"; echo "</th>";
    echo "<th>"; echo "Department"; echo "</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($res)) 
    {
      echo "<tr>";
      echo "<td>"; echo $row['bid']; echo "</td>";
      echo "<td>"; echo $row['name']; echo "</td>";
      echo "<td>"; echo $row['authors']; echo "</td>";
      echo "<td>"; echo $row['edition']; echo "</td>";
      echo "<td>"; echo $row['status']; echo "</td>";
      echo "<td>"; echo $row['quantity']; echo "</td>";
      echo "<td>"; echo $row['department']; echo "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }

?>

  </body>

</html>
