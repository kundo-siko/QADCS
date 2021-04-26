<?php
$ministries = array(
    "Ministry of Agriculture",
	"Ministry of Commerce, Trade and Industry",
	"Ministry of Defence",
    "Ministry of Finance",
    "Ministry of Foreign Affairs",
    "Ministry of Gender",
    "Ministry of General Education",
    "Ministry of Health",
    "Ministry of Higher Education",
    "Ministry of Home Affairs",
    "Ministry of Information and Broadcasting Services",
    "Ministry of Justice",
    "Ministry of Labour and Social Security",
    "Ministry of Lands and Natural Resources",
    "Ministry of Community Development and Social Services",
    "Ministry of Local Government",
    "Ministry of Mines and Minerals Development",
    "Ministry of National Guidance and Religious Affairs",
    "Office of the Vice-President",
    "Provincial Ministers",
    "Ministry of Sport, Youth and Child Development",
    "Ministry of Energy",
    "Ministry of Tourism and Arts",
    "Ministry of Transport and Communications",
    "Ministry of Works and Supply"
	);
 foreach($ministries as $ministries){
?>
  <option  value="<?php echo $ministries; ?>">
 <?php echo $ministries; ?>
  </option> 
<?php } ?>