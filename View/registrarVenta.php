<h2>Registrar Venta</h2>
<form action="registrar_venta.php" method="post">
    <label for="tipo_combustible">Tipo de Combustible:</label>
    <select name="tipo_combustible" id="tipo_combustible">
        <option value="Regular">Regular</option>
        <option value="Especial">Especial</option>
        <option value="Diesel">Diesel</option>
    </select>
    <br><br>
    <label for="galones">Galones:</label>
    <input type="number" name="galones" id="galones" min="1" max="1000" required>
    <br><br>
    <input type="submit" value="Registrar">
</form>

<?php
require_once 'conexion.php';
$conexion = conectar();

$tipo_combustible = $_POST['tipo_combustible'];
$galones = $_POST['galones'];

if ($tipo_combustible && $galones) {
    $precio = 0;
    switch ($tipo_combustible) {
        case 'Regular':
            $precio = 3.75;
            break;
        case 'Especial':
            $precio = 3.64;
            break;
        case 'Diesel':
            $precio = 3.96;
            break;
    }
    $total = $galones * $precio;
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    
    $query = "INSERT INTO ventas (tipo_combustible, galones, total, fecha, hora) VALUES ('$tipo_combustible', $galones, $total, '$fecha', '$hora')";
    $resultado = mysqli_query($conexion, $query);
    
    if ($resultado) {
        header('Location: inicio.php');
    } else {
        echo "Error al registrar la venta";
    }
} else {
    echo "Faltan campos por llenar";
}
?>
