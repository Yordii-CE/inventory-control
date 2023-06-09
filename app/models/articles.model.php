<?php

class ArticlesModel extends Model
{
    public function __construct()
    {
        $this->loadDatabase();
    }

    function getAll()
    {
        $articles = $this->db->select("select articulos.*, marcas.nombre 'marca', modelos.nombre 'modelo' 
        from articulos
        join marcas on articulos.id_marca = marcas.id
        join modelos on articulos.id_modelo = modelos.id");
        return $articles;
    }

    function getBrands()
    {
        $brands = $this->db->select("select * from marcas");
        return $brands;
    }

    function getModels()
    {
        $models = $this->db->select("select * from modelos");
        return $models;
    }

    function insert($serial, $name, $description, $stock, $responsibleName, $brandId, $modelId)
    {
        $this->db->insert("insert into articulos (numero_serie, nombre, descripcion, stock, nombre_responsable, id_marca, id_modelo) 
        values($serial, '$name', '$description', $stock, '$responsibleName', $brandId, $modelId)");
    }

    function update($id, $serial, $name, $description, $stock, $responsibleName, $brandId, $modelId)
    {
        $this->db->update("update articulos set 
        numero_serie = $serial,
        nombre = '$name',
        descripcion = '$description',
        stock = $stock,
        nombre_responsable = '$responsibleName',
        id_marca = $brandId,
        id_modelo = $modelId

        where id = $id");
    }

    function delete($id)
    {
        $this->db->delete("delete from articulos where id = $id");
    }
}
