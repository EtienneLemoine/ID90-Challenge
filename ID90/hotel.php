
<?php

$guests=$_POST["guests"];
$checkin=$_POST["checkIn"];
$checkout=$_POST["checkOut"];
$destination=$_POST["destino"];
$keyword="";
$rooms=1;
$longitude="";
$latitude="";
$sort_criteria="Overall";
$sort_order="desc";
$per_page=25;
$page=1;
$currency="USD";
$price_low="";
$price_high="";

$endpoint="https://beta.id90travel.com/api/v1/hotels.json";
$method="GET";
$url=$endpoint.$method."?guests[]=".$guests."&checkin=".$checkin."&checkout=".$checkout."&destination=".$destination."&keyword=".$keyword."&rooms=".$rooms."&longitude=".$longitude."&latitude=".$latitude."&sort_criteria=".$sort_criteria."&sort_order=".$sort_order."&per_page=".$per_page."&page=".$page."&currency=".$currency."&price_low=".$price_low."&price_high=".$price_high;


$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$response=curl_exec($ch);
curl_close($ch);

$response=json_decode($response,true);

$response = $response['hotels'];

$hoteles = array_map(function($item) {
    return $item['name'];
}, $response);

$imagenes = array_map(function($item) {
    return $item['image'];
}, $response);

?>

<html>
<link rel="stylesheet" href="./estilos/hoteles.css">
<center>
<div class="background">
<a href="./hoteles.html">
<button class="btn">Volver</button>
</a>
<label class="label">RESULTADOS DE BUSQUEDA: </label>
<script>
    <?php
        foreach($hoteles as $hotel) {
             echo "document.write('<p value=\"$hotel\">$hotel</p>');";
        }
    ?>
</script>
</div>
</center>

</html>