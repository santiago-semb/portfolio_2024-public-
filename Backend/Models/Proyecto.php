<?php 
#require_once "$_SERVER[DOCUMENT_ROOT]/portfolio_2024/Backend/db/Conectar.php";
require_once "$_SERVER[DOCUMENT_ROOT]/Backend/db/Conectar.php";
class Proyecto {

    public function __construct(
        private int|string $id,
        private string $descripcion,
        private string $tecnologias,
        private string $link,
        private bool $status
    )
    {}

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public static function select($id = null): array
    {
            $connection = Conectar::conexion();
            try{
                ($id === null) ? $query = "SELECT * FROM proyectos" : $query = "SELECT * FROM proyectos WHERE id=$id";
                $res = $connection->prepare($query);
                $res->execute();
                $data = $res->fetchAll(PDO::FETCH_ASSOC);          
            }
            catch(Exception $err)
            {
                echo $err;
            }
        return $data;
    }

}