<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIT = htmlspecialchars(trim($_POST["numero"]));

    // Codigo para buscar en tu base de datos acá


    require 'config/database.php';

    $sqlsi = "SELECT * FROM db_afiliados WHERE numero = '$NIT'";
    $resultado = $mysqli->query($sqlsi);
    $dato = $resultado->fetch_assoc();



$pnombre = $dato['pnombre'];
$papellido = $dato['papellido'];

echo json_encode([
   'pnombre' => $pnombre,
   'papellido'    => $papellido
]);





} else {
    echo "<p>No se encontro el pnombre en la DB!!</p>";
}
?>