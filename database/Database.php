<?php

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $name = DB_NAME;

        protected function connect() {
            # Set Database ServerName (DSN)
            $dbConnection = "mysql:host=" . $this->host . ";dbname=" . $this->name;

            # Set Options
            $options = array(
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            );

            # Connectino to the database in a try / catch block
            try {
                $pdo = new PDO($dbConnection, $this->user, $this->password, $options);
                return $pdo;
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }
    }

?>