<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
<title>AQI</title>
<meta http-equiv="refresh" content="300">
<?php
  $ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,"https://api.thingspeak.com/channels/1654690/feeds.json?results=2");
// Execute
$bvrith_json=curl_exec($ch);
// Closing
$bvrith_result = json_decode($bvrith_json, true);
curl_close($ch);
$feeds=$bvrith_result["feeds"][0];
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-Y H:i:s', time());
?>
<div  class="w3-container w3-mobile w3-main">
<h2 class="w3-green w3-center"><b>BVRIT HYDERABAD Air Quality Index(AQI) </b> &nbsp;&nbsp;&nbsp;  at <?php echo $date;?></h2>
 <?php 
    if($feeds["field5"]<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($feeds["field5"]>50 && $feeds["field5"]<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($feeds["field5"]>101 && $feeds["field5"]<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($feeds["field5"]>150 && $feeds["field5"]<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($feeds["field5"]>200 && $feeds["field5"]<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-quarter w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }    
    echo "<h3>BVRITH</h3>";
    echo "<h2>".$feeds["field5"]."</h2>";
    echo "CO2 : ".$feeds["field4"]; 
    echo ", CO : ".$feeds["field2"]."<br>";
    echo "NH3 : ".$feeds["field1"];
    echo ", NO2 : ".$feeds["field3"]."<br>";
    echo '</div>';
 ?>


<?php
$sanath_nagar_ch1 = curl_init();
// Will return the response, if false it print the response
curl_setopt($sanath_nagar_ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($sanath_nagar_ch1, CURLOPT_URL,"https://api.thingspeak.com/apps/thinghttp/send_request?api_key=TVZKRT338I0RGEJK");
// Execute
$json=curl_exec($sanath_nagar_ch1);
// Closing
$sanath_nagar_result =json_decode($json, true);
curl_close($sanath_nagar_ch1);
?>

 <?php 
    if($sanath_nagar_result<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($sanath_nagar_result>50 && $sanath_nagar_result<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($sanath_nagar_result>101 && $sanath_nagar_result<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($sanath_nagar_result>150 && $sanath_nagar_result<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($sanath_nagar_result>200 && $sanath_nagar_result<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-quarter w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }  
    echo "<h3>Sanath Nagar</h3>";
    //echo "Created At:".date('d-m-Y')."<br>";
    echo "<h2>".$sanath_nagar_result."</h2>";
    echo "</div>";
 ?>


<?php
$central_university_ch1 = curl_init();
// Will return the response, if false it print the response
curl_setopt($central_university_ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($central_university_ch1, CURLOPT_URL,"https://api.thingspeak.com/apps/thinghttp/send_request?api_key=RMUTHLK0HMAWWUHG");
// Execute
$central_university_json=curl_exec($central_university_ch1);
// Closing
$central_university_result = json_decode($central_university_json, true);
curl_close($central_university_ch1);
?>
<?php 
    if($central_university_result<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($central_university_result>50 && $central_university_result<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($central_university_result>101 && $central_university_result<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($central_university_result>150 && $central_university_result<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($central_university_result>200 && $central_university_result<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-third w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }  
    echo "<h3>Central University</h3>";
    //echo "Created At:".date('d-m-Y')."<br>";
    echo "<h2>".$central_university_result."</h2>";
    echo "</div>";
 ?>


<?php
$bollaram_industrial_area_ch1 = curl_init();
// Will return the response, if false it print the response
curl_setopt($bollaram_industrial_area_ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($bollaram_industrial_area_ch1, CURLOPT_URL,"https://api.thingspeak.com/apps/thinghttp/send_request?api_key=O8ATW8BMZU22ETQP");
// Execute
$bollaram_industrial_area_json=curl_exec($bollaram_industrial_area_ch1);
// Closing
$bollaram_industrial_area__result = json_decode($bollaram_industrial_area_json, true);
curl_close($bollaram_industrial_area_ch1);
?>
 <?php 
    if($bollaram_industrial_area__result<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($bollaram_industrial_area__result>50 && $bollaram_industrial_area__result<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($bollaram_industrial_area__result>101 && $bollaram_industrial_area__result<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($bollaram_industrial_area__result>150 && $bollaram_industrial_area__result<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($bollaram_industrial_area__result>200 && $bollaram_industrial_area__result<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-quarter w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }  
    echo "<h3>Bollaram Industrial <br> Area</h3>";
    //echo "Created At:".date('d-m-Y')."<br>";
    echo "<h2>".$bollaram_industrial_area__result."</h2>";
    echo "</div>";
 ?>



<?php
$icrisat_patancheru_ch1 = curl_init();
// Will return the response, if false it print the response
curl_setopt($icrisat_patancheru_ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($icrisat_patancheru_ch1, CURLOPT_URL,"https://api.thingspeak.com/apps/thinghttp/send_request?api_key=CD0KZVACF6GQTUI3");
// Execute
$icrisat_patancheru_json=curl_exec($icrisat_patancheru_ch1);
// Closing
$icrisat_patancheru_result = json_decode($icrisat_patancheru_json, true);
curl_close($icrisat_patancheru_ch1);
?>
<?php 
    if($icrisat_patancheru_result<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($icrisat_patancheru_result>50 && $icrisat_patancheru_result<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($icrisat_patancheru_result>101 && $icrisat_patancheru_result<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($icrisat_patancheru_result>150 && $icrisat_patancheru_result<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($icrisat_patancheru_result>200 && $icrisat_patancheru_result<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-quarter w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }  
    echo "<h3>ICRISAT Patancheru</h3>";
    //echo "Created At:".date('d-m-Y')."<br>";
    echo "<h2>".$icrisat_patancheru_result."</h2>";
    echo "</div>";
 ?>

<?php
$zoo_park_bahadurpura_west_ch1 = curl_init();
// Will return the response, if false it print the response
curl_setopt($zoo_park_bahadurpura_west_ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($zoo_park_bahadurpura_west_ch1, CURLOPT_URL,"https://api.thingspeak.com/apps/thinghttp/send_request?api_key=7MAWNQNGLNDLQ4TO");
// Execute
$zoo_park_bahadurpura_west_json=curl_exec($zoo_park_bahadurpura_west_ch1);
// Closing
$zoo_park_bahadurpura_west_result = json_decode($zoo_park_bahadurpura_west_json, true);
curl_close($zoo_park_bahadurpura_west_ch1);
?>
<?php
    if($zoo_park_bahadurpura_west_result<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($zoo_park_bahadurpura_west_result>50 && $zoo_park_bahadurpura_west_result<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($zoo_park_bahadurpura_west_result>101 && $zoo_park_bahadurpura_west_result<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($zoo_park_bahadurpura_west_result>150 && $zoo_park_bahadurpura_west_result<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($zoo_park_bahadurpura_west_result>200 && $zoo_park_bahadurpura_west_result<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-quarter w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }  
    echo "<h3>Zoo Park, <br> Bahadurpura </h3>";
    //echo "Created At:".date('d-m-Y')."<br>";
    echo "<h2>".$zoo_park_bahadurpura_west_result."</h2>";
    echo "</div>";
 ?>


<?php
$us_consulate_ch1 = curl_init();
// Will return the response, if false it print the response
curl_setopt($us_consulate_ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($us_consulate_ch1, CURLOPT_URL,"https://api.thingspeak.com/apps/thinghttp/send_request?api_key=4R2AUW5YKYINTYPL");
// Execute
$us_consulate_json=curl_exec($us_consulate_ch1);
// Closing
$us_consulate_result = json_decode($us_consulate_json, true);
curl_close($us_consulate_ch1);
?>
 <?php 
    if($us_consulate_result<=50){
        echo '<div class="w3-border w3-quarter w3-round-medium w3-teal  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($us_consulate_result>50 && $us_consulate_result<=100) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-yellow  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($us_consulate_result>101 && $us_consulate_result<=150) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-orange  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($us_consulate_result>150 && $us_consulate_result<=200) {
        echo '<div class="w3-border w3-quarter w3-round-medium w3-red w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else if($us_consulate_result>200 && $us_consulate_result<=300) {
        echo '<div  class="w3-border w3-quarter w3-round-medium w3-win8-indigo  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }else{
        echo '<div class="w3-border w3-quarter w3-round-medium w3-win8-crimson  w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">';
    }  
    echo "<h3>Hyderabad US <br>Consulate  Begumpet </h3>";
    //echo "Created At:".date('d-m-Y')."<br>";
    echo "<h2>".$us_consulate_result."</h2>";
    echo "</div>";
 ?>

<div class="w3-border w3-quarter w3-round-medium w3-center w3-padding-32 w3-margin w3-btn" style="width: 250px; height: 220px;">
    <div class="w3-left-align"><button class="w3-button w3-teal  w3-xxlarge"></button>&nbsp;Good</div>
    <div class="w3-left-align"><button class="w3-button w3-yellow  w3-xxlarge"></button>&nbsp;Moderate</div>
    <div class="w3-left-align"><button class="w3-button w3-orange  w3-xxlarge"></button>&nbsp;Below Moderate</div>
    <div class="w3-left-align"><button class="w3-button w3-red  w3-xxlarge"></button>&nbsp;Unhealthy</div>
    <div class="w3-left-align"><button class="w3-button w3-win8-indigo  w3-xxlarge"></button>&nbsp;Very Unhealthy</div>
    <div class="w3-left-align"><button class="w3-button w3-win8-crimson  w3-xxlarge"></button>&nbsp;Hazardous</div>
    
    
</div>    
    

<br><br>
 <div class="w3-mobile"><img class="w3-image w3-center" src="aqi.png" style="width:100%; "><span class="w3-display-middle w3-xxlarge w3-opacity w3-wide w3-cursive w3-text-white"><i style="text-shadow:1px 1px 0 #444;"> BVRITH</i></span></div> 
 <div class="w3-mobile w3-teal w3-center">Source : BVRITH and https://aqicn.org/</div> 
</div>  
 
 
