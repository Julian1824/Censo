<?php
/*
if(isset($_GET['id'])){

    $id = $_GET['id'];*/
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-type:   application/x-msexcel; charset=utf-8");
    header("Content-Disposition: attachment; filename=abc.xls"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    
    
    

    


include("../../model/conexioni.php");

$sql = mysqli_query($conn, "SELECT * FROM tbl_personas");
$resultado = $sql->fetch_all(MYSQLI_ASSOC);
$rowcount = mysqli_num_rows($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

</head>
<body>

<div class="container">

    
        <h1 class="pt-2 text-center">LISTA USUARIOS</h1>
    <img src="" alt="" srcset="">

<table class="table table-borderless table-hover caption-top bordered">
  <thead class="table-dark">
  <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Fecha N.</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
  </thead>
  <tbody  class="table-light">
    <?php
    if($rowcount == 0){
        echo '<tr><td colspan="8">No hay Registro.</td></tr>';    
    }else{
    foreach($resultado as $row){ ?>
        <tr>
            <td><?php echo $row["DNI"] ?></td>
            <td><?php echo $row["NOMBRE"] ?></td>
            <td><?php echo $row["FECNAC"] ?></td>
            <td><?php echo $row["DIR"] ?></td>
            <td><?php echo $row["TFNO"] ?></td>            
    <?php 
    
} ?>
        </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php echo "Usuarios: " . $rowcount; ?>

<script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>