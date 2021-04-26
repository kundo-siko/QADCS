<?php
$types = array(
    "Contract", 
    "Permanent and Pensionable",
    "Probation",
    "Temporal" 
	);
 foreach($types as $types){
?>
  <option  value="<?php echo $types; ?>">
 <?php echo $types; ?>
  </option> 
<?php } ?>