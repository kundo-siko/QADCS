<?php
$status = array(
    "Administrative Convinience", 
    "Acting with a view for Promotion",
    "Substantive",
    "Regrading", 
    "Secondment", 
    "Transfer", 
    "Attachment" 
	);
 foreach($status as $status){
?>
  <option  value="<?php echo $status; ?>">
 <?php echo $status; ?>
  </option> 
<?php } ?>