<?php 

class personas{

    private $pdo;

    public $idPersonas;
    public $DNI;
    public $NOMBRE;
    public $FECNAC;
    public $DIR;
    public $TFNO;
    public $imagen;



    public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}public function Listar(){
    try
    {
        $result = array();

        $stm = $this->pdo->prepare("SELECT * FROM tbl_personas");
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}public function Registrar(personas $data)
{
    try
    {
        //Sentencia SQL.
        $sql = "INSERT INTO tbl_personas (DNI,NOMBRE,FECNAC,DIR,TFNO,imagen)VALUES (?, ?, ?, ?, ?,?)";
        $this->pdo->prepare($sql)
         ->execute(
            array(
                $data->DNI,
                $data->NOMBRE,
                $data->FECNAC,
                $data->DIR,
                $data->TFNO,
                $data->imagen
            )
        );
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}public function Eliminar($idPersonas)
{
    try
    {
        //Sentencia SQL para eliminar una tupla utilizando
        //la clausula Where.
        $stm = $this->pdo
                    ->prepare("DELETE FROM tbl_personas WHERE idPersonas  = ?");

        $stm->execute(array($idPersonas));
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}public function Obtener($idPersonas)
{
    try
    {
        //Sentencia SQL para selección de datos utilizando
        //la clausula Where para especificar el nit del proveedor.
        $stm = $this->pdo->prepare("SELECT * FROM tbl_personas WHERE idPersonas = ?");
        //Ejecución de la sentencia SQL utilizando el parámetro nit.
        $stm->execute(array($idPersonas));
        return $stm->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}
public function Actualizar($data)
{
    try
    {
        //Sentencia SQL para actualizar los datos.
        $sql = "UPDATE tbl_personas SET DNI=?,NOMBRE=?,FECNAC=?,DIR=?,TFNO=?,imagen=? WHERE idPersonas = ?";
        //Ejecución de la sentencia a partir de un arreglo.
        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->DNI,
                    $data->NOMBRE,
                    $data->FECNAC,
                    $data->DIR,
                    $data->TFNO,
                    $data->imagen,
                    $data->idPersonas
                )
            );
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}


}

?>