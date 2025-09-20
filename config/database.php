<?php
// A simple class to manage database connection using PDO


class Database
{
    private $conn;

    // Get database connection
    public function getConnection()
    {
        $this->conn = null;

        // Configuration placeholders
        // Replace these with actual values in a local config file or .env
        $host = 'YOUR_HOST';        
        $db_name = 'YOUR_DB_NAME';  
        $username = 'YOUR_USER';    
        $password = 'YOUR_PASSWORD';

        try {
            // Create PDO connection
            $this->conn = new PDO(
                "mysql:host=$host;dbname=$db_name",
                $username,
                $password
            );

            // Set charset to UTF-8
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            // Display error message (in real projects, consider logging instead)
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>

