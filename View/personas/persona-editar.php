<h1 class="page-header">
    <?php echo $pvd->idPersonas != null ? $pvd->NOMBRE : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=personas">Personas</a></li>
  <li class="active"><?php echo $pvd->idPersonas != null ? $pvd->NOMBRE : 'Nuevo Registro'; ?></li>
</ol>

<form id="formulario" action="?c=personas&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idPersonas" value="<?php echo $pvd->idPersonas; ?>" />

    <div class="form-group">
        <label>Dni</label>
        <input type="text"  id="DNI" name="DNI" value="<?php echo $pvd->DNI; ?>" class="form-control" placeholder="Cedula" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" id="nomprod" name="NOMBRE" value="<?php echo $pvd->NOMBRE; ?>" class="form-control" placeholder="Nombre Usuario" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Fecha Nacimiento</label>
        <input type="date" name="FECNAC" value="<?php echo $pvd->FECNAC; ?>" class="form-control" placeholder="Dirección Usuario" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" id="direcc" name="DIR" value="<?php echo $pvd->DIR; ?>" class="form-control" placeholder="Dirección Usuario" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" id="tel" name="TFNO" value="<?php echo $pvd->TFNO; ?>" class="form-control" placeholder="Teléfono usuaario" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Imagen</label>
        <input type="file" id="imagen" name="imagen" value="<?php echo $pvd->imagen; ?>" class="form-control" placeholder="imagen usuario" data-validacion-tipo="requerido|min:10" />
    </div>
    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
  evento.preventDefault();
        var DNI = document.getElementById('DNI').value;
        var nomprod = document.getElementById("nomprod").value;
        var direcc = document.getElementById("direcc").value;
        var tel = parseInt(document.getElementById("tel").value);

  var inputidDNI = document.querySelector("#DNI");
  var inputnomprod = document.querySelector("#nomprod");
  var inputdirecc = document.querySelector("#direcc");
  var inputtel = document.querySelector("#tel");

  if(DNI.trim() == null || DNI.trim().length == 0) {
    alert('No has escrito nada en la cedula');
    inputidDNI.style.border = "2px solid #FF0000";
    inputidDNI.addEventListener('blur', function() {
        inputidDNI.style.border = "2px solid #2C2626";
            });
    return;
  }else if(direcc.trim() == null || direcc.trim().length == 0) {
    alert('No has escrito nada en el direccion');
    inputdirecc.style.border = "2px solid #FF0000";
    inputdirecc.addEventListener('blur', function() {
        inputdirecc.style.border = "2px solid #2C2626";
            });
    return;
  }else if(nomprod.trim() == null || nomprod.trim().length == 0) {
    alert('No has escrito nada en el nombre usuario');
    inputnomprod.style.border = "2px solid #FF0000";
    inputnomprod.addEventListener('blur', function() {
        inputnomprod.style.border = "2px solid #2C2626";
            });
    return;
  }else if(tel == null || tel <= 0 || isNaN(tel)) {
    alert('No has escrito nada telefono(solo numero)');
    inputtel.style.border = "2px solid #FF0000";
    inputtel.addEventListener('blur', function() {
        inputtel.style.border = "2px solid #2C2626";
            });
    return;
  }
  
  this.submit();
}

/*
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })*/
</script>
