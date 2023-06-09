<?php
class TypesModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }
    function getAll()
    {
        $models = $this->db->select("select * from modelos");
        return $models;
    }

    function insert($name)
    {
        $this->db->insert("insert into modelos(nombre) values('$name')");
    }

    function update($id, $name)
    {
        $this->db->update("update modelos set nombre = '$name' where id = $id");
    }
}
