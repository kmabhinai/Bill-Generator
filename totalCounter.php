<?php
  session_start();
  include("dbconnection.php");
  $totalProfit= mysqli_query($con,"SELECT SUM(profit) AS total_profit FROM bill_generator WHERE DATE(order_date) = CURDATE();");
  $row = mysqli_fetch_assoc($totalProfit); 
  $sum = $row['total_profit'];
  echo $sum;
  ?>