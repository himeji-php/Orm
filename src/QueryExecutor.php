<?php

declare(strict_types = 1);

namespace Himeji\Orm;

class QueryExecutor
{
    private $connection;

    public function __construct($host, $username, $password, $database, $port = 3306) {
        $this->switchConnection($host, $username, $password, $database, $port);
    }

    public function switchConnection($host, $username, $password, $database, $port) {
        $this->connection = mysqli_connect($host, $username, $password, $database, $port);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    public function execute($command) : bool|\mysqli_result {
        return $this->connection->query($command);
    }
}