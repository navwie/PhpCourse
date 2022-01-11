<?php

namespace Framework\Core\AbstractModel;

use PDO;
use Framework\Database\Db;

class Model
{
    protected PDO $dbConnect;

    public function __construct()
    {
        $this->dbConnect = Db::getInstance()->connect();

    }
}