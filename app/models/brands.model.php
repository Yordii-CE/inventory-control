<?php
class BrandsModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }

    function getAll()
    {
        $brands = $this->db->select("select * from marcas");
        return $brands;
    }

    function insert($name)
    {
        $this->db->insert("insert into marcas(nombre) values('$name')");
    }

    function update($id, $name)
    {
        $this->db->update("update marcas set nombre = '$name' where id = $id");
    }
}
