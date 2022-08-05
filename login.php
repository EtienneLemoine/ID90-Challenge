<?php
    $response = file_get_contents('https://beta.id90travel.com/airlines');
    $response = json_decode($response, true);
    $aerolineas = array_map(function($item) {
        return $item['code'];
    }, $response);


?>
<html>
 <form action="form.php" method="post">
    <label>Aerolinea</label>
    <select name="aero">
         <script>
            <?php
                foreach($aerolineas as $aerolinea) {
                    echo "document.write('<option value=\"$aerolinea\">$aerolinea</option>');";
                }
            ?>
         </script>
    </select>
    Nombre: <input type="text" name="nombre"><br>
    Contraseña: <input type="password" name="contraseña"><br>
    <input type="submit" value="Enviar">
 </form>
</html>
