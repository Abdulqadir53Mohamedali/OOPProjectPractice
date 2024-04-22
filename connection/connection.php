<?php

class database
{
    protected $host  = 'localhost'; 
    protected $db_Name = 'rza';
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

<!-- 
Database Existence: Confirm that a MySQL database named rza exists on your MySQL server.

Correct Host: Make sure that MySQL is running on localhost. If you're using a port other than the default (3306), you need to specify it in the DSN string.

User Privileges: Check that the root user has permissions to access the rza database and that there is no password set for root. If there's a password, you would need to include it.

PDO Extension: Ensure that the PDO extension and the PDO MySQL driver are both enabled in your PHP installation.
If you encounter the "1046 No database selected" error despite having the correct details, here's a checklist:

Double-check the database name for any spelling errors or case sensitivity issues.

Ensure that the MySQL service is currently running and listening on localhost.

If you're running this code on a web server, make sure the server environment is configured correctly to connect to your MySQL server.




 -->