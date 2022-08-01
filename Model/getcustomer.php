<?php
include("conexioni.php");

$sql = "SELECT * FROM tbl_lideres WHERE id_censistas = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id_censistas, $Nombre, $numero, $horario);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>Identificacion</th>";
echo "<td>" . $id_censistas . "</td>";
echo "<th>Nombre del Lider</th>";
echo "<td>" . $Nombre . "</td>";
echo "<th>Numero de Contacto</th>";
echo "<td>" . $numero . "</td>";
echo "<th>Horaio</th>";
echo "<td>" . $horario . "</td>";
echo "</tr>";
echo "</table>";
?>
