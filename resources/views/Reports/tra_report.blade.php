 @php
		$x = 1; 		
		$date = date("Y-m-d");			
		
		//export.php  
$connect = mysqli_connect("localhost", "root", "", "qadcs");
$output = '';

	if($to != null){
$query = "SELECT * FROM trainings,employees where trainings.employee_no = employees.employee_no AND trainings.finish > '$to' OR trainings.finish BETWEEN '$from' AND '$to' GROUP BY trainings.id";	
$period = $from.' to '.$to; 
	}else{
$query = "SELECT * FROM trainings, employees where trainings.employee_no = employees.employee_no AND trainings.finish > '$date' ORDER BY 'employee_no'";
$period = "All";	
	}
	
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
              <th>S/N</th>
			  <th>Employee</th>
              <th>Surname</th>
              <th>Other Names</th>
              <th>Course/Programme</th>
              <th>Current Stage</th>
              <th>Final Qualification</th>
              <th>Start Date</th>
              <th>Finish Date</th>
              <th>Training Institution</th>
              <th>Sponsor</th>
     
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
						 <td>'.$row["employee_no"].'</td>
                         <td>'.$row["surname"].'</td>
                         <td>'.$row["other_names"].'</td>
                         <td>'.$row["course"].'</td>
						 <td>'.$row["stage"].'</td>
                         <td>'.$row["qualification"].'</td>		
                         <td>'.$row["start"].'</td> 
                         <td>'.$row["finish"].'</td>  
                         <td>'.$row["institution"].'</td>  
                         <td>'.$row["sponsor"].'</td>          
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Training-Records-Report-'.$period.'.xls');
  echo $output;
 }

		 
			@endphp
		   