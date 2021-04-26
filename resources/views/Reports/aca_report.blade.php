 @php
		$x = 1; 
		$s = $q;
	//export.php  
$connect = mysqli_connect("localhost", "root", "", "qadcs");
$output = '';

	if($q == 'All'){
	$query = "SELECT * FROM academics, employees where academics.employee_no = employees.employee_no ORDER BY 'employee_no'";		
		}elseif($q == 'grade9'){
	$query = "SELECT * FROM academics, employees where grade9 = 'Yes' AND academics.employee_no = employees.employee_no ORDER BY 'employee_no'";			
		}elseif($q == 'grade12'){
	$query = "SELECT * FROM academics, employees where grade12 = 'Yes' AND academics.employee_no = employees.employee_no ORDER BY 'employee_no'";		
		}elseif($q == 'other'){
	$query = "SELECT * FROM academics, employees where other = 'Yes' AND academics.employee_no = employees.employee_no ORDER BY 'employee_no'";		
		$s = "specify";
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
              <th>Qualifications</th> 
              <th>Attained</th> 
     
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
                         <td>'.$q.'</td>
                          <td>'.$row[$s].'</td>
						
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Academic-Qualifications-Report-'.$q.'.xls');
  echo $output;
 }
		 
		 
	@endphp
		   