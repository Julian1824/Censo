<?php
require_once 'model/personas.php';

class PersonasController{


    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new personas();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/heas/header.php';
        require_once 'view/personas/persona.php';
        require_once 'view/heas/footer.php';

    }public function Crud(){
        $pvd = new personas();

        //Se obtienen los datos del proveedor a editar.
        if(isset($_REQUEST['idPersonas'])){
            $pvd = $this->model->Obtener($_REQUEST['idPersonas']);
        }

        //Llamado de las vistas.
        require_once 'view/heas/header.php';
        require_once 'view/personas/persona-editar.php';
        require_once 'view/heas/footer.php';
  } 
    
    
    //Llamado a la vista proveedor-nuevo
    public function Nuevo(){
        $pvd = new personas();

        //Llamado de las vistas.
        require_once 'view/heas/header.php';
        require_once 'view/personas/persona-nuevo.php';
        require_once 'view/heas/footer.php';
    }
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new personas();

        //Captura de los datos del formulario (vista).
        $pvd->DNI = $_REQUEST['DNI'];
        $pvd->NOMBRE = $_REQUEST['NOMBRE'];
        $pvd->DIR = $_REQUEST['DIR'];
        $pvd->FECNAC = $_REQUEST['FECNAC'];
        $pvd->TFNO = $_REQUEST['TFNO'];
        $pvd->imagen=$_FILES['imagen']['name'];

        $pvd->carpeta_destinos=$_SERVER['DOCUMENT_ROOT'].'../mvcCenso/uploads/';

        move_uploaded_file($_FILES['imagen']['tmp_name'],$pvd->carpeta_destinos.$pvd->imagen);

        //Registro al modelo proveedor.
        $this->model->Registrar($pvd);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: index.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idPersonas']);
        header('Location: index.php');
    }public function Editar(){
        $pvd = new personas();

        $pvd->idPersonas = $_REQUEST['idPersonas'];
        $pvd->DNI = $_REQUEST['DNI'];
        $pvd->NOMBRE = $_REQUEST['NOMBRE'];
        $pvd->FECNAC = $_REQUEST['FECNAC'];
        $pvd->DIR = $_REQUEST['DIR'];
        $pvd->TFNO = $_REQUEST['TFNO'];
        $pvd->imagen=$_FILES['imagen']['name'];

        $pvd->carpeta_destinos=$_SERVER['DOCUMENT_ROOT'].'../mvcCenso/uploads/';

        move_uploaded_file($_FILES['imagen']['tmp_name'],$pvd->carpeta_destinos.$pvd->imagen);
        
        $this->model->Actualizar($pvd);

        header('Location: index.php');
    }
  
}