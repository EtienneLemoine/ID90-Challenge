<?php
   $nombre = $_POST["nombre"];
   $contraseña = $_POST["contraseña"];
   $aero = $_POST["aero"];
   $datos = array('airline' => $aero,
   'username' => $nombre,'password' => $contraseña,
   'remember_me'=>1);
   $url = 'https://beta.id90travel.com/session.json';
   $ch = curl_init($url);
   $payload = json_encode($datos);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch);
   if($result == '{"error":"Invalid Username or Password"}'){
     header('Location:fallo.html');
   } else {
    header('Location:exitoso.html');
   }
?>