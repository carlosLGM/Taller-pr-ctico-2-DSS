<!DOCTYPE html>
<html>
<head>
  <title>Gasolinera</title>
</head>
<body>
  <h1>Gasolinera</h1>
  <div>
    <h2>Tanques</h2>
    <table>
      <thead>
        <tr>
          <th>Tipo de combustible</th>
          <th>Capacidad máxima</th>
          <th>Cantidad actual</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($tanques as $tanque): ?>
          <tr>
            <td><?= $tanque['tipo_combustible'] ?></td>
            <td><?= $tanque['capacidad_maxima'] ?> galones</td>
            <td><?= $tanque['cantidad_actual'] ?> galones</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <form method="post" action="index.php">
      <input type="hidden" name="accion" value="rellenar_tanques">
      <button type="submit">Rellenar tanques</button>
    </form>
  </div>
  <div>
    <h2>Despacho de combustible</h2>
    <form method="post" action="index.php">
      <input type="hidden" name="accion" value="realizar_venta">
      <label for="tipo_combustible">Tipo de combustible:</label>
      <select name="tipo_combustible" id="tipo_combustible">
        <option value="regular">Regular</option>
        <option value="especial">Especial</option>
        <option value="diesel">Diesel</option>
      </select>
      <br>
      <label for="cantidad">Cantidad (en galones):</label>
      <input type="number" name="cantidad" id="cantidad" min="0" step="0.01" required>
      <br>
      <button type="submit">Despachar</button>
    </form>
  </div>
  <div>
    <h2>Ventas realizadas</h2>
    <form method="get" action="index.php">
      <label for="fecha_inicio">Fecha de inicio:</label>
      <input type="date" name="fecha_inicio" id="fecha_inicio" required>
      <br>
      <label for="hora_inicio">Hora de inicio:</label>
      <input type="time" name="hora_inicio" id="hora_inicio" required>
      <br>
      <label for="fecha_fin">Fecha de fin:</label>
      <input type="date" name="fecha_fin" id="fecha_fin" required>
      <br>
      <label for="hora_fin">Hora de fin:</label>
      <input type="time" name="hora_fin" id="hora_fin" required>
      <br>
      <button type="submit">Filtrar</button>
    </form>
    <table>
      <thead>
        <tr>
          <th>Tanque</th>
          <th>Tipo de combustible</th>
          <th>Galones despachados</th>
          <th>Total en dinero</th>
          <th>Fecha y hora</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($ventas as $venta): ?>
        <tr>
            <td><?php echo $venta['tipo_combustible']; ?></td>
            <td><?php echo $venta['galones']; ?></td>
            <td><?php echo "$" . number_format($venta['total'], 2); ?></td>
            <td><?php echo $venta['fecha']; ?></td>
            <td><?php echo $venta['hora']; ?></td>
            <td>
                <a href="editar_venta.php?id=<?php echo $venta['id']; ?>">Editar</a>
                <a href="eliminar_venta.php?id=<?php echo $venta['id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>


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
