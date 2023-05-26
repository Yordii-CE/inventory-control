<?php
require_once 'query.php';

class Model
{
    public $db;
    function loadDatabase()
    {
        $db = new Database();
        $this->db = new Query($db->connect());
    }
}
