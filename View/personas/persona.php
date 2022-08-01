
<style>
th,td {
  padding: 5px;
}
</style>

<h1 class="page-header">Censo</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=personas&a=Nuevo">Nuevo usuario</a>
    <a href="View/personas/Excel.php"><input type="button" class="btn btn-success" value="Excel"></a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Fecha N.</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th >Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    <!--


    -->
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->DNI; ?></td>
            <td><?php echo $r->NOMBRE; ?></td>
            <td><?php echo $r->FECNAC; ?></td>
            <td><?php echo $r->DIR; ?></td>
            <td><?php echo $r->TFNO; ?></td>
            <?php $ruta_img = $r->imagen; ?>

            <td><img src="uploads/<?php echo $ruta_img;?>" width="110" height="150"/></td>

            <td>
                <a href="?c=personas&a=Crud&idPersonas=<?php echo $r->idPersonas; ?>">Editar</a>
                <a href="">|</a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=personas&a=Eliminar&idPersonas=<?php echo $r->idPersonas; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h2>Censadores</h2>

<form action=""> 
  <select name="customers" onchange="showCustomer(this.value)">
    <option value="">Seleccione el Lider:</option>
    <option value="1007373267">Alejandro Araque</option>
    <option value="3228214 ">Rosa Maria Serna</option>
    <option value="1254871">Juan Romero</option>
  </select>
</form>
<br>
<div id="txtHint">Lideres</div>

<script>

function showCustomer(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "model/getcustomer.php?q="+str);
  xhttp.send();
}
</script>
