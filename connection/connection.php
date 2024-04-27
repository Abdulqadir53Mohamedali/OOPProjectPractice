<?php

class database
{
    protected $host  = 'localhost'; 
    protected $db_Name = 'themePark';
    protected $user = 'root';
    protected $password = '';

    public function connect()
    {
        try{
            $pdo = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db_Name , $this->user , $this->password );
            $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo ;
        }

        catch(PDOException $exception){
            echo "connection error" . $exception->getMessage();
            die();
        }
    }
}
?>

