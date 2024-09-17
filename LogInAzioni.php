<?php 



$hours=@$_POST['hours'];
$minutes=@$_POST['min'];
$mess='';


if($hours == NULL)
	$hours=0;
if($minutes == NULL)
	$minutes=0;


if(isset($_POST['submit'])&& cn($hours)&& cn($minutes)){
	if($minutes==0){
		$mess="<br><b class='grasvert'>" . $hours;
		if($hours==1){
			$mess .= " ora equivale a ";}
		else
			$mess .= " ore equivalgono a ";}

	else if($hours==0){
		$mess="<br><b class='grasvert'>" . $minutes;
		if($minutes==1){
			$mess .= " minuto equivale a ";}
		else
			$mess .= " minuti equivalgono a ";}
		
		else{
			
			$mess="<br><b class='grasvert'>" . $hours;
			if($hours==1)
				$mess .= " ora e ";
			else
				$mess .= " ore e ";
			
			$mess.= $minutes;
			if($minutes==1)
				$mess .= " minuto equivalgono a ";
			else
				$mess .= " minuti equivalgono a ";}	

	$Ciccio = 90;

	   $minutes += ($hours*60);
	   
	   if(MCD($minutes,$Ciccio)==1){
		$mess.=$minutes."/".$Ciccio . " di Esorciccio</b>";}
	   else if($minutes%$Ciccio==0){
		   $intCiccio = $minutes/$Ciccio;
		   if(($intCiccio)==1){
		   $mess.= $intCiccio . " Esorciccio.</b>";}
			else{
			$mess.= $intCiccio . " Esorcicci.</b>";}}
	   else{
		  $mess.=($minutes/MCD($minutes,$Ciccio)) . "/" . $Ciccio/MCD($minutes,$Ciccio)." di Esorciccio</b>";}
}
?>
<?php 
function cn($data){
  if($data>0 || $data<=0){
    return true;
    //echo "Numero";
  }
  else
  return false;
  //echo "Non numero";
 }
 
?>
<?php 
   function MCD($n1,$n2){
    for($i=1;$i<=$n1;$i++){
	if(($n1%$i==0)&&($n2%$i==0)){ 
	$divisore=$i;
	}
	}
    return $divisore;
   }
 
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="cssfile.css">
		<title>Conversione Tempo-Esorciccio</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	
			<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 600px;
			width: 800px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>
	</head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<body style="background-image: url('locandina.jpg');">
	<div class="jumbotron jumbotron-fluid" >
        <div class="container" style="background-color:#ffffff;margin-top:3%;margin-bottom:7%;"> 
		<br>
		<p align="center"><font size="5"><strong><u>
			CONVERSIONE TEMPO-ESORCICCIO
		</u></strong></font></p>
		<p align="center"><font size="3"><strong>
			"L'unit&#224 di tempo preferita di Synergo"
		</strong></font></p>
		
	<div id="content" align="center">
	<form  action="" method="POST">
	<center><p>Tempo da convertire: <input type="number" name="hours" min=0 value="<?php print $hours;?>"> ore, 
				<input type="number" name="min" min=0 max=59 value="<?php print @$_POST['min'];?>"> minuti.</p>
		<input type='submit' name="submit" value='Procedi'></center></form>
	
	<?php print $mess;?>
	<br><br>
	</div>
	</div>
</body>
</html>
