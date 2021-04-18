<?php

include "includes/db_connect.inc.php";

  session_start();

  if(!isset($_SESSION['t_id']))
  {
    header("Location: teacher.php");
  }

$tName = " ";
$tID = $_SESSION["t_id"];

  $sqlUserCheck = "SELECT t_name FROM teacher WHERE t_id = '$tID' ";
	$result = mysqli_query($conn, $sqlUserCheck);

  while($row = mysqli_fetch_assoc($result))
  {
  $tName= $row["t_name"];
}


?>



<html>
  <head>
    <title>International School Dhaka</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
  </head>

      <style media="screen">
      #button {
    	background:linear-gradient(to bottom, #6495ED 5%, #6495ED 100%);
    	background-color:#6495ED;
    	border-radius:1px;
    	display:inline-block;
    	cursor:pointer;
    	color:#ffffff;
    	font-family:Arial;
    	font-size:15px;
    	font-weight:bold;
    	padding:9px 22px;
    	text-decoration:none;
    	text-shadow:0px 1px 0px #3d768a;
    }
    #button:hover {
    	background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
    	background-color:#6495ED;
    }
    #button:active {
    	position:relative;
    	top:1px;
    }
      </style>



  <body>
    <img src="ISD.jpg" alt="ISD_logo" width="100px"></img>
	  <div id ="container" style=" height:1000px; width:1250px;">
	    <div id="header">
		 <h1>International School Dhaka</h1>
		 </div>


     <table id="table" style="float:left">
         <tr>
           <td>
             <div id="nav" style="margin-left:14%;">
          <h2>Welcome,<?php echo $tName ?></h2>
        <br>
        <br>
        <br>
        <div style="margin-left:20%;">
        <p><span style="color:red"><a href="Teacheraddnotice.php"><b>Add Notice</b></a></span>
        <p><span style="color:red"><a href="library.php" target="_blank"><b>Check Library</b></a></span>
        <p><span style="color:red"><a href="changeTeacherpass.php"><b>Change Password</b></a></span>
        <br>
       </div>
       </div>
</td>
     </tr>
   </table>




   <table id="table1"  style="float:left">
<td>
  <tr>
       <div align = "left" style="margin-left:86%;"><br>
    <span style="color:red"><a href="aboutTeacher.php"><b>About you</b></a></span><br>
		   </div>

       <br>
       <br>
       <br>

       		   <div id="main">

                <table id="table" align = "right" style="margin-right:10%;">
            <h2 style= "margin-left:68%;"><u>Rountine</u></h2><br>
                  <tr>
            <th align="center">Sub Id</th>
            <th align="center">Sub Name</th>
            <th align="center">Class</th>
            <th align="center">Start Day</th>
            <th align="center">End Day</th>
            <th align="center">Time</th>

            </tr>

                  <?php


                  $sql = "SELECT * FROM routine WHERE t_id = '$tID'";
                  $result = mysqli_query($conn,$sql);

                  $numOFrow = mysqli_num_rows($result);

                  if ($numOFrow > 0)
                  {

                  while($row = $result->fetch_assoc())
                      {


                  echo '<tr>
                              <td align="center">'.$row['sub_id'].'</td>
                              <td align="center">'.$row['sub_name'].'</td>
                              <td align="center">'.$row['class'].'</td>
                              <td align="center">'.$row['start_day'].'</td>
                              <td align="center">'.$row['end_day'].'</td>
                              <td align="center">'.$row['timing'].'</td>
                          </tr>';
                  }
                  echo "</table>";
                  }
                  else
                  {
                     echo "0 results";
                   }

                    ?>
</table>
</div>
</td>
 </tr>

</table>

</div>

    <div id="footer">
       <button style="margin-right:10%;" id = "button" onclick="window.location.href = 'home.html';">Logout</button>
     </div>
      </div>


  </body>
</html>
