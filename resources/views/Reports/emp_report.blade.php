 @php
		$x = 1; 		
					
		
		//export.php  
$connect = mysqli_connect("localhost", "root", "", "qadcs");
$output = '';

	if($search == $from){
$query = "SELECT * FROM employment_records, employees where employment_records.employee_no = employees.employee_no AND appointment_date BETWEEN '$search' AND '$to' ORDER BY 'employee_no'";	
$search = $from.' to '.$to;	
	}elseif($search != 'All' && $from != null){
$query = "SELECT * FROM employment_records, employees where employment_records.employee_no = employees.employee_no AND $column = '$search' AND appointment_date BETWEEN '$from' AND '$to' ORDER BY 'employee_no'";
	}elseif($search != 'All' && $from == null){
$query = "SELECT * FROM employment_records, employees where $column = '$search' AND employment_records.employee_no = employees.employee_no ORDER BY 'employee_no'";
	}else{
 $query = "SELECT * FROM employment_records, employees where employment_records.employee_no = employees.employee_no ORDER BY 'employee_no'";
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
              <th>Position</th>
              <th>Appointment Date</th>
              <th>Appointment Status</th>
              <th>Appointment Type</th>
              <th>Duration</th>
              <th>Section</th>
              <th>Department</th>
              <th>Ministry/Institution</th>
              <th>Station</th>
              <th>District</td>
              <th>Province</td>
     
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
                         <td>'.$row["position"].'</td> 
                         <td>'.$row["appointment_date"].'</td>  
                         <td>'.$row["appointment_status"].'</td>  
                         <td>'.$row["appointment_type"].'</td>       
                         <td>'.$row["duration"].'</td>       
                         <td>'.$row["section"].'</td>       
                         <td>'.$row["department"].'</td>       
                         <td>'.$row["ministry"].'</td>       
                         <td>'.$row["station"].'</td>       
                         <td>'.$row["district"].'</td>        
                         <td>'.$row["province"].'</td>        
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Employment-Records-Report-'.$search.'.xls');
  echo $output;
 }

		 
			@endphp
		   