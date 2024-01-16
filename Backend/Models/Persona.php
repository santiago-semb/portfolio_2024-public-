<?php 
#require_once "$_SERVER[DOCUMENT_ROOT]/portfolio_2024/Backend/db/Conectar.php";
require_once "$_SERVER[DOCUMENT_ROOT]/Backend/db/Conectar.php";

class Persona {

    public function __construct(
        private int|string $id,
        private string $nombre,
        private string $apellido,
        private int $edad,
        private string $pais,
        private string $ciudad,
        private int|string $telefono,
        private string $email,
        private array $redes,
        private string $curriculum
    )
    {}

    public function __get($name): string|int
    {
        return $this->$name;
    }
    public function __set($name, $value): void
    {
        $this->$name = $value;
    }

    public static function select(int $id = null, string $keyword = null): array
    {
            $connection = Conectar::conexion();
            try{
                if($keyword === null)
                {
                    ($id === null) ? $query = "SELECT * FROM personas" : $query = "SELECT * FROM personas WHERE id=$id"; 
                }
                if($id != null)
                {
                    ($keyword === null) ? $query = "SELECT * FROM personas" : $query = "SELECT * FROM personas WHERE keyword=$keyword";         
                }                  
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