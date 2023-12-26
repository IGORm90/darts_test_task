<?php

namespace Core;

use Lib\Db;

abstract class Model
{

    public $db;

    public function __construct()
    {
        $this->db = new Db;
    }
}
