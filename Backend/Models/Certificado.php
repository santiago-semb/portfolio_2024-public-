<?php 
#require_once "$_SERVER[DOCUMENT_ROOT]/portfolio_2024/Backend/db/Conectar.php";
require_once "$_SERVER[DOCUMENT_ROOT]/Backend/db/Conectar.php";
class Certificado {

    public function __construct(
        private int|string $id,
        private string $titulo,
        private string $link,
        private string $img
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
                ($id === null) ? $query = "SELECT * FROM certificados" : $query = "SELECT * FROM certificados WHERE id=$id";
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

    public static function selectPaginate($page = 1, $perPage = 3): array
    {
        $connection = Conectar::conexion();
        try {
            $offset = ($page - 1) * $perPage;
            $query = "SELECT * FROM certificados LIMIT $perPage OFFSET $offset";
            $res = $connection->prepare($query);
            $res->execute();
            $data = $res->fetchAll(PDO::FETCH_ASSOC);

            // Obtener el total de certificados para calcular el número total de páginas
            $totalQuery = "SELECT COUNT(*) as total FROM certificados";
            $totalRes = $connection->prepare($totalQuery);
            $totalRes->execute();
            $totalCertificados = $totalRes->fetch(PDO::FETCH_ASSOC)['total'];
            $totalPages = ceil($totalCertificados / $perPage);
        } catch (Exception $err) {
            echo $err;
        }

        return [
            'certificados' => $data,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ];
    }


}