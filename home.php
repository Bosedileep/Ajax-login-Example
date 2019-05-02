<?php
$rMsg = "";
    $sMsg = "";
require('conf.php');
$id = $_GET["id"];
$current_date = date("Y-m-d");
            $date7=date("Y-m-d", strtotime("-90 days", strtotime($current_date)));
    $sql = $con->query("SELECT date, time_from, time_to, comments, activity_id, date_submitted FROM timesheet WHERE employee_id=$id and date between '$date7' and '$current_date';");
 if($sql->num_rows > 0){
        echo "<table border='4' class='stats' cellspacing='0'>
            <tr>
            <th class='hed' colspan='8'><h3>Timesheet</h3></th>
              </tr>
            <tr>
            <th>Date</th>
            <th>Time From</th>
            <th>Time To</th>
            <th>Comments</th>
            <th>Location</th>
            <th>Date Submitted</th>
            </tr>";
           while($row = $sql->fetch_assoc()){
                $codeid = $row["activity_id"];
			    $activity = $con->query("SELECT code FROM activity WHERE id = $codeid;");
                  if($activity->num_rows > 0){
                		$code = $activity->fetch_assoc();
                	}
              echo "<tr>";
              echo "<td>" . $row["date"] . "</td>";
              echo "<td>" . $row["time_from"] . "</td>";
              echo "<td>" . $row["time_to"] . "</td>";
              echo "<td>" . $row["comments"] . "</td>";
              echo "<td>" . $code["code"] . "</td>";
              echo "<td>" . $row["date_submitted"] . "</td>";
              echo "</tr>";
                }
                // form for adding time sheet.
            echo "    <tr>
            <th colspan='8'>Last 14 Days Timesheet
            
            </th>
              </tr>";
              echo "</table>";	
}
else{
    echo 'data not found';
    echo $id;
    echo $current_date;
    echo $date7;
}
?>