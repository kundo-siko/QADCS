<?php
//Central Province is composed of 12 district[3]

$central = array(
    "Chibombo District",
    "Chisamba District",
    "Chitambo District",
    "Itezhi-Tezhi District",
    "Kabwe District",
    "Kapiri Mposhi District",
    "Luano District",
    "Mkushi District",
    "Mumbwa District",
    "Ngabwe District",
    "Serenje District",
    "Shibuyunji District"
	);
foreach($central as $central){
?>
  <option id="central" onclick= "central()" value="<?php echo $central; ?>">
 <?php echo $central; ?>
  </option> 
<?php } 

//Copperbelt Province
///Districts of Copperbelt Province Zambia

//Copperbelt Province is composed of 10 districts[5]
$copperbelt = array(
    "Chililabombwe District",
    "Chingola District",
    "Kalulushi District",
    "Kitwe District",
    "Luanshya District",
    "Lufwanyama District",
    "Masaiti District",
    "Mpongwe District",
    "Mufulira District",
    "Ndola District"
	);
foreach($copperbelt as $copperbelt){
?>
  <option id="copperbelt" onclick= "copperbelt()" value="<?php echo $copperbelt; ?>">
 <?php echo $copperbelt; ?>
  </option> 
<?php } 

//Eastern Province
//Districts of Eastern Province Zambia
//Eastern Province is composed of 14 districts.[6]
$eastern = array(
    "Chadiza District",
    "Chasefu District",
    "Chipangali District",
    "Chipata District",
    "Kasenengwa District",
    "Katete District",
    "Lumezi District",
    "Lundazi District",
    "Lusangazi District",
    "Mambwe District",
    "Nyimba District",
    "Petauke District",
    "Sinda District",
    "Vubwi District"
	);
foreach($eastern as $eastern){
?>
  <option id="eastern" onclick= "eastern()" value="<?php echo $eastern; ?>">
 <?php echo $eastern; ?>
  </option> 
<?php } 

//Luapula Province
//Districts of Luapula Province Zambia
//Luapula Province is composed of 12 districts.[7]
$luapula = array(
    "Chembe District",
    "Chiengi District",
    "Chifunabuli District",
    "Chipili District",
    "Kawambwa District",
    "Lunga District",
    "Mansa District",
    "Milenge District",
    "Mwansabombwe District",
    "Mwense District",
    "Nchelenge District",
    "Samfya District"
	);
foreach($luapula as $luapula){
?>
  <option id="luapula" onclick= "luapula()" value="<?php echo $luapula; ?>">
 <?php echo $luapula; ?>
  </option> 
<?php } 

//Lusaka Province
//Districts of Lusaka
//Lusaka Province is composed of 7 districts.[8]
$lusaka = array(
    "Chilanga District",
    "Chirundu District",
    "Chongwe District",
    "Kafue District",
    "Luangwa District",
    "Lusaka District",
    "Rufunsa District"
	);
foreach($lusaka as $lusaka){
?>
  <option id="lusaka" onclick= "lusaka()" value="<?php echo $lusaka; ?>">
 <?php echo $lusaka; ?>
  </option> 
<?php } 

//Muchinga Province
//Districts of Muchinga Province Zambia
//Muchinga Province is composed of 10 Districts.[9]
$muchinga = array(
    "Chama District",
    "Chinsali District",
    "Chilinda District",
    "Isoka District",
    "Kanchibiya District",
    "Lavushimanda",
    "Mafinga District",
    "Mpika District",
    "Nakonde District",
    "Shiwang'andu District"
	);
foreach($muchinga as $muchinga){
?>
  <option id="muchinga" onclick= "muchinga()" value="<?php echo $muchinga; ?>">
 <?php echo $muchinga; ?>
  </option> 
<?php } 

//Northern Province
//Districts of Northern Province Zambia
//Northern Province is composed of 12 districts.[10]
$northen = array(
    "Chilubi District",
    "Kaputa District",
    "Kasama District",
    "Lunte District",
    "Lupososhi District",
    "Luwingu District",
    "Mbala District",
    "Mporokoso District",
    "Mpulungu District",
    "Mungwi District",
    "Nsama District",
    "Senga District"
	);
	sort($northen);
foreach($northen as $northen){
?>
  <option id="northen" onclick= "northen()" value="<?php echo $northen; ?>">
 <?php echo $northen; ?>
  </option> 
<?php } 

//North-Western Province
//Districts of North-Western Zambia
//North-Western Province is composed of 11 districts.[11]
$north_western = array(
    "Chavuma District",
    "Ikelenge District",
    "Kabompo District",
    "Kasempa District",
    "Kalumbila District",
    "Manyinga District",
    "Mufumbwe District",
    "Mushindamo District",
    "Mwinilunga District",
    "Solwezi District",
    "Zambezi District"
	);
foreach($north_western as $north_western){
?>
  <option id="north_western" onclick= "north_western()" value="<?php echo $north_western; ?>">
 <?php echo $north_western; ?>
  </option> 
<?php } 

//Southern Province
//Districts of Southern Zambia
//Southern Province is composed of 13 districts. The provincial capital was moved from Livingstone to Choma in 2012, with Livingstone retaining the status of national tourist capital. Livingstone is also the cleanest town in Zambia.[12]
$southern = array(
    "Chikankata District",
    "Choma District",
    "Gwembe District",
    "Kalomo District",
    "Kazungula District",
    "Livingstone District",
    "Mazabuka District",
    "Monze District",
    "Namwala District",
    "emba District",
    "Siavonga District",
    "Sinazongwe District",
    "Zimba District"
	);
foreach($southern as $southern){
?>
  <option id="southern" onclick= "southern()" value="<?php echo $southern; ?>">
 <?php echo $southern; ?>
  </option> 
<?php } 

//Western Province
//Districts of Western Zambia
//Western Province is composed of 16 districts.[13]
$western = array(
    "Kalabo District",
    "Kaoma District",
    "Limulunga District",
    "Luampa District",
    "Lukulu District",
    "Mitete District",
    "Mongu District",
    "Mulobezi District",
    "Mwandi District",
    "Nalolo District",
    "Nkeyema District",
    "Senanga District",
    "Sesheke District",
    "Shang'ombo District",
    "Sikongo District",
    "Sioma District"
	);
	foreach($western as $western){
?>
  <option id="western" onclick= "western()" value="<?php echo $western; ?>">
 <?php echo $western; ?>
  </option> 
<?php } 

	?>