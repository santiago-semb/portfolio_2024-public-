<?php 
#require "$_SERVER[DOCUMENT_ROOT]/portfolio_2024/Backend/helpers/get_env.php";
require "$_SERVER[DOCUMENT_ROOT]/Backend/helpers/get_env.php";
class Conectar {
    public static function conexion()
    {
        try {
            # driver - host - database - username - password
            $conexion = new PDO(
                "mysql:host={$GLOBALS['DB_HOST']};dbname={$GLOBALS['DB_NAME']};charset={$GLOBALS['DB_CHARSET']}",
                $GLOBALS['DB_USERNAME'],
                $GLOBALS['DB_PASSWORD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
            
        }
        catch(Exception $err)
        {
            $errors = [
                'Message' => "<span style='color:red'><b>Message</b>: ".$err->getMessage().'</span>',
                'Line' => "<span style='color:red'><b>Line</b>: ".$err->getLine().'</span>',
                'Code' => "<span style='color:red'><b>Code</b>: ".$err->getCode().'</span>',
            ];
            foreach($errors as $error){
                echo $error . "<br>";
            }
        }
        return $conexion;
    }
}