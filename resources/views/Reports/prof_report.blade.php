 @php
		$x = 1; 
		
	//export.php  
$connect = mysqli_connect("localhost", "root", "", "qadcs");
$output = '';

	if($qualify != 'All'){
	$query = "SELECT * FROM professionals, employees where qualification = '$qualify' OR level = '$qualify' AND professionals.employee_no = employees.employee_no ORDER BY 'employee_no'";		
		}else{
	$query = "SELECT * FROM professionals, employees where professionals.employee_no = employees.employee_no ORDER BY 'employee_no'";
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
              <th>Qualification</th>
              <th>Level</th>
              <th>Insitution Attended</th>
              <th>Year Obtained</th>  
     
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
                         <td>'.$row["qualification"].'</td> 
                         <td>'.$row["level"].'</td>  
                         <td>'.$row["institution"].'</td>  
                         <td>'.$row["year"].'</td>       
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Professional-Qualifications-Report-'.$qualify.'.xls');
  echo $output;
 }

		 
			@endphp
		   