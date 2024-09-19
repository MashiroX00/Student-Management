<?php
    class Controller {
        private $connection;

        public function __construct($conn)
        {
            $this->connection = $conn;
        }
    }
?>