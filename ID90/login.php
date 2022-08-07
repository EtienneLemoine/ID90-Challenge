<?php
    $response = file_get_contents('https://beta.id90travel.com/airlines');
    $response = json_decode($response, true);
    $aerolineas = array_map(function($item) {
        return $item['code'];
    }, $response);
?>
<html>
<link rel="stylesheet" href="./estilos/style.css">
<center>
 <form action="form.php" method="post" class="background">
  
    <label class="label">Aerolinea</label>
    <select name="aero">
         <script>
            <?php
                foreach($aerolineas as $aerolinea) {
                    echo "document.write('<option value=\"$aerolinea\">$aerolinea</option>');";
                }
            ?>
         </script>
    </select>
    <div class="separacion">
    <label class="label">Nombre: </label><input type="text" name="nombre">
    </div>
    <label class="label">Contraseña: </label><input type="password" name="contraseña">
    <br/>
    <div class="espacioBtn">
    <input type="submit" value="Enviar" class="btn">
    </div>
 </form>
 </center>
</html>
