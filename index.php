
<?php ini_set("display_errors",0);error_reporting(0);
?>
<form action="cracksha1md5.php" method="post" >
<p>
<label for="pseudo">hash</label> : <input type="text" name="hash" id="pseudo" value="" />
<input type="submit" value="analyser" />
</p>
</form>



<?php
$_POST['hash'] = htmlspecialchars($_POST['hash']); 
$postfields = array();
$postfields["crack"] = "crack";
$postfields["hash"] = $_POST['hash'];
$url = "http://crackhash.com/";
$useragent = "Mozilla/5.0";
$referer = $url; 
 $ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
curl_setopt($ch, CURLOPT_REFERER, $referer);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resultat = curl_exec($ch);
curl_close($ch);
$nouanda = new DOMDocument();
$nouanda->loadHTML($resultat);

foreach($nouanda->getElementsByTagName('tr') as $pamela){
    if($pamela->getAttribute('class') == "success"){
	
	$description = '<p>' . $pamela->getElementsByTagName('center')->item(0)->nodeValue. '</p>';
	echo $description;
    }
	
	else if ($pamela->getAttribute('class') == "danger")
	
	{
	
	$description = '<p>' . $pamela->getElementsByTagName('center')->item(0)->nodeValue. '</p>';
	echo 'we did not find a match among several thousand hashes this means that your hash is quite robust but do not forget the basic measures a salt well complicated and
a password of 10 characters minimum containing special characters and capital letters remember you are never paranoid enough in security.';
	
	
	}
	
	
	
	
}
foreach($nouanda->getElementsByTagName('div') as $pamelas){

if($pamelas->getAttribute('class') == "alert alert-info alert-dismissable"){


echo'rr';


}


}



?>