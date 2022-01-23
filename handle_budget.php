<?php

$email=$_COOKIE["email"];
$password=$_COOKIE["password"];

require('connect.php');

if(isset($_POST['total'])){
    $total=$_POST['total'];
}
if(isset($_POST['rent'])){
    $rent=$_POST['rent'];
    }
if(isset($_POST['grocery'])){
    $grocery=$_POST['grocery'];
    }
if(isset($_POST['transport'])){
    $transport=$_POST['transport'];
    }
if(isset($_POST['savings'])){
  $savings=$_POST['savings'];
  }


   $sql="update users set total='$total' , rent='$rent' , grocery='$grocery' , transport='$transport' , savings='$savings' where email='$email' and password='$password'";
if ($total>0 || $total-$rent-$grocery-$transport-$savings > 0) {
   if($conn->query($sql)==TRUE){
       ?>

       <html>
         <head>
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
           <script type="text/javascript">
             google.charts.load('current', {'packages':['corechart']});
             google.charts.setOnLoadCallback(drawChart);

             function drawChart() {

               var data = google.visualization.arrayToDataTable([
                 ['Task', 'Money per month'],
                 ['Rent',     <?php echo $rent;?>],
                 ['Grocery',  <?php echo $grocery;?>],
                 ['Transport',<?php echo $transport;?>],
                 ['Savings',  <?php echo $savings;?>],
                 ['Other',    <?php echo $total-$rent-$grocery-$transport-$savings;?>]
               ]);

               var options = {
                 title: 'Money Distribution'
               };

               var chart = new google.visualization.PieChart(document.getElementById('piechart'));

               chart.draw(data, options);
             }
           </script>
         </head>
         <body>
           <div id="piechart" style="width: 900px; height: 500px;"></div>
         </body>
       </html>


       <?php
  }
   else{
    echo "error" . $conn->error;
   }
 }
   else {
     echo "Total should be more than other inputs.";
   }
?>
